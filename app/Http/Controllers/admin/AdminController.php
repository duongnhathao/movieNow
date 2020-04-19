<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\MovieController;
use App\MovieCast;
use App\MovieDirector;
use App\MovieGenres;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Movie;
use App\User;
use App\MovieChapter;
use App\MovieRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth:admin');
    }
    public function table(){
        try {

            $movies = DB::table('movie')->get();
//            dd($rating);
            return view('admin.table', compact('movies'));

        } catch (\Exception $e) {
            return view('error_page.404page');
        }
    }
    public function tmp(Request $request){
        $size = 0;
        $array = $request->nameDirector;
        for($i = 0; $i<count($array); $i++){
            $arrayName = explode(' ', $array[$i]);
            if(count($arrayName)==1){
                array_push($arrayName, '');
                $output = MovieDirector::get_all_director_by_name($arrayName[0], $arrayName[1]);
                if(empty($output[$size])==true){
                    echo 'khon co ten';
                }else{
                    echo $output[$size]->dir_fname;
                }
            }else{
                $output = MovieDirector::get_all_director_by_name($arrayName[0], $arrayName[1]);
                if(empty($output[$size])==true){
                    echo 'khon co ten';
                }else{
                    echo $output[$size]->dir_fname;
                }
            }

            #$size++;
        }
        //dd(empty($output[2]));
        //return view('admin.tmp');
    }
    public function vote(){
        try {
            $movie_ratings = DB::table('movie_rating')->get();
            return view('admin.vote', compact('movie_ratings'));
        } catch (\Throwable $e) {
            return view('error_page.404page');
        }
    }


    public function member(){
        try {
            $member = DB::table('users')->get();
            return view('admin.member', compact('member'));
        } catch (\Throwable $e) {
            return view('error_page.404page');
        }
    }
    //Add member
    public function add_member(){
        try {
            return view('admin.add_member');
        } catch (\Throwable $e) {
            return view('error_page.404page');
        }
    }

    //Add member
    public function add_movie(){
        try {
            return view('admin.add_movie');
        } catch (\Throwable $e) {
            return view('error_page.404page');
        }
    }

    public static function getNumberOMovieByDate($date){
        $from = date('1990/01/01');
        $to = date($date);
        $num = DB::table('movie')->whereBetween('created_at', [$from, $to])->get()->count();
        $num2 = DB::table('movie')->whereBetween('deleted_at', [$from, $to])->get()->count();

        return $num-$num2;
    }
    public static function getTopXMovieRating($x_top){
        $ddb =  DB::table('movie')
            ->select('mov_id')
            ->distinct()
            ->orderByDesc('nums_start')
            ->take($x_top)
            ->get();
        return $ddb;


    }
    public static function getNumberORatingByDate(){
        $from = date('1990/01/01');
        $to = date(Carbon::now());
        $list_movie = DB::table('movie')->select('mov_id')->get();

        foreach ($list_movie as $movie){
            $num = DB::table('movie_rating')->where('mov_id','=',$movie->mov_id)->whereBetween('rev_date', [$from, $to])->select('rev_starts')->get();
            $total = 0;
            foreach ($num as $n){
                $total += $n->rev_starts;
            }
            DB::table('movie')->where('mov_id','=',$movie->mov_id)->update(array('nums_start'=>$total,));
        }

//        dd($list_movie);
    }
    public static function getNumberRatingByDate($date,$mov_id){
        $from = date('1990/01/01');
        $to = date($date);
        $list_movie = DB::table('movie')->where('mov_id','=',$mov_id)->get();

        foreach ($list_movie as $movie){
            $num = DB::table('movie_rating')->where('mov_id','=',$movie->mov_id)->whereBetween('rev_date', [$from, $to])->select('rev_starts')->get();
            $total = 0;
            foreach ($num as $n){
                $total += $n->rev_starts;
            }

        }
        return $total;

//        dd($list_movie);
    }
    public static function  Reverse($array)
    {
        return(array_reverse($array));
    }
    public static function getPercentGenres(){
        $arrayPercent = array();
        $total = DB::table('movie_genres')->get()->count();
        for($i =1 ;$i<=10;$i++){
            $percent = DB::table('movie_genres')->where('gen_id','=',$i)->count();
            $percent = $percent/$total*100;
            array_push($arrayPercent,round($percent,2));
        }
        array_push($arrayPercent,round(100 - array_sum($arrayPercent),2));
        return $arrayPercent;
    }
    public function index(){
        try {
            $movieNumber = MovieController::getNumMoVie();
            $genresNumber = MovieController::getAllGenres()->count();
            $memberNumber = DB::table('users')->get()->count();
            $thismonth = Carbon::now();
            $total_rating = AdminController::getNumberORatingByDate($thismonth);
            $value = array();
            for($i = $thismonth->month;$i >= 1 ;$i--){
                $numMovie  = AdminController::getNumberOMovieByDate($thismonth);
                array_push($value,$numMovie);
                $thismonth = $thismonth->subMonth();
            }
            $deleted = DB::table('movie')->whereNotNull('deleted_at')->get()->count();
            $top5 = self::getTopXMovieRating(5);
            $value = AdminController::Reverse($value);
            $arrayPercent = AdminController::getPercentGenres();
            return view('admin.index',compact('movieNumber','genresNumber','memberNumber','value','arrayPercent','deleted','top5'));

        } catch (\Exception $e) {
            return view('error_page.404page');
        }
    }
    public function print(){
        try {
            $movieNumber = MovieController::getNumMoVie();
            $genresNumber = MovieController::getAllGenres()->count();
            $memberNumber = DB::table('users')->get()->count();
            $thismonth = Carbon::now();
            $total_rating = AdminController::getNumberORatingByDate($thismonth);
            $value = array();
            for($i = $thismonth->month;$i >= 1 ;$i--){
                $numMovie  = AdminController::getNumberOMovieByDate($thismonth);
                array_push($value,$numMovie);
                $thismonth = $thismonth->subMonth();
            }
            $deleted = DB::table('movie')->whereNotNull('deleted_at')->get()->count();
            $top5 = self::getTopXMovieRating(5);
            $value = AdminController::Reverse($value);
            $arrayPercent = AdminController::getPercentGenres();
            return view('admin.print',compact('movieNumber','genresNumber','memberNumber','value','arrayPercent','deleted','top5'));

        } catch (\Exception $e) {
            return view('error_page.404page');
        }
    }
    public function getTop5Movie(){
        try {
            $movie_ratings = DB::table('movie_rating')->get();
            return view('admin.vote', compact('movie_ratings'));
        } catch (\Throwable $e) {
            return view('error_page.404page');
        }

    }
    public function showMovieByID(Request $request){
        if ($request->has(['mov_id'])){
            $movie = Movie::get_movie_by_id($request->mov_id);
            $chapters = MovieChapter::get_all_chapter_by_movie_id($request->mov_id);
            return view('admin.edit_movie',compact('movie','chapters'));
        }

    }

    //Add Chapter
    public function addChapter(Request $request){
        //dd($request->mov_id);
            if($request->has(['mov_id'])){
                $movie = Movie::get_movie_by_id($request->mov_id);
                $chapters = MovieChapter::get_all_chapter_by_movie_id($request->mov_id);
                return view('admin.add_chapter', compact('movie', 'chapters'));
            }
    }
    public function updateChapter($id,$num){
        //dd($request->mov_id);

            $movie = Movie::get_movie_by_id($id);
            $chapters = MovieChapter::get_chapter_by_chapter_nums_movie_id($num,$id);
//            dd($movie);
            return view('admin.update_chapter', compact('movie', 'chapters'));

    }
    public function updateChapterSuccessfull(Request $request){
        if($request->hasFile('myFile'))
        {
            $filenameWithExt = $request->file('myFile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extention = $request->file('myFile')->getClientOriginalExtension();
            $fileNameToStore = $filename.'.'.$extention;

            $path = $request->file('myFile')->move(
                'movies/x-men the last stand', $fileNameToStore
            ); } else{
            $path = $request->link;
        }
            $movie = Movie::get_movie_by_id($request->mov_id);
            $chapternum=$request->nums;


            DB::table('movie_chapter')->where([['mov_id','=',$request->mov_id],['chapter_nums','=',$chapternum]])->update(
                [
                    'mov_id'=>$movie->mov_id,
                    'chapter_nums'=>$chapternum,
                    'chapter_name'=>$request->nameChapter,
                    'chapter_link'=>$path
                ]
            );

            return view('admin.add_chapter_successfull', compact('movie'));

    }
    //Add chapter successfull
    public function addChapterSuccessfull(Request $request){
        if($request->hasFile('myFile'))
        {
            $filenameWithExt = $request->file('myFile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extention = $request->file('myFile')->getClientOriginalExtension();
            $fileNameToStore = $filename.'.'.$extention;

            $path = $request->file('myFile')->move(
                'movies/x-men the last stand', $fileNameToStore
            );
            $movie = Movie::get_movie_by_id($request->mov_id);
            $chapternum=0;

            try {

                $chapternum = DB::table('movie_chapter')->where('mov_id',$request->mov_id)->select('chapter_nums')->orderByDesc('chapter_nums')->first()->chapter_nums;
//                dd($chapternum);
                $chapternum+=1;

            }
            catch (\Exception $e){
                $chapternum=0;
            }
            DB::table('movie_chapter')->insert([
                [
                    'mov_id'=>$movie->mov_id,
                    'chapter_nums'=>$chapternum,
                    'chapter_name'=>$request->nameChapter,
                    'chapter_link'=>$path
                ]
            ]);

            return view('admin.add_chapter_successfull', compact('movie'));
        }
    }
    public function deleteChapter($id,$num){
//        dd($id);
        DB::table('movie_chapter')->where([['mov_id','=',$id],['chapter_nums','=',$num]])->delete();
        return redirect('admin/table');
    }
    public function postMovie(Request $request){

        $this->validate($request,
            [
                'movieTitle'=>'required|min:3|max:50',
                'year'=>'required|numeric',
                'language'=>'required|min:2|max:50',
                'country'=>'min:2|max:5'

            ],
            [
                'movieTitle.required'=>'Title field cannot be empty!',
                'movieTitle.min'=>'Title must be at least 3 characters and at most 50 characters.',
                'movieTitle.max'=>'Title must be at least 3 characters and at most 50 characters.',
                'year.required'=>'Year of manufacture field cannot be empty!',
                'year.numeric'=>'Year Invalid!',
                'language.required'=>'language field cannot be empty!',
                'language.min'=>'language must be at least 2 characters and at most 50 characters.',
                'language.max'=>'language must be at least 2 characters and at most 50 characters.',

                'country.min'=>'country must be at least 2 characters and at most 5 characters.',
                'country.max'=>'country must be at least 2 characters and at most 5 characters.'
            ]
        );
        if($request->hasFile('moviePicture'))
        {
            $year = (int) $request->year;
            $movieTime = (int) $request->time;
            $checkDate = (int)$request->yearManufacture;
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $dayNow = (int) Carbon::now('Asia/Ho_Chi_Minh')->day;
            $monthNow = (int) Carbon::now('Asia/Ho_Chi_Minh')->month;
            $yearNow = (int) Carbon::now('Asia/Ho_Chi_Minh')->year;
            $arrayTmp =  explode('-',$request->yearManufacture);

            if($arrayTmp[0]>$yearNow){
                return redirect('admin/add_movie')->with('year', 'Year cannot be greater than the current year!');
            }else if($arrayTmp[1]>$monthNow){
                return redirect('admin/add_movie')->with('year', 'Month cannot be greater than the current month!');
            }else if($arrayTmp[2]>$dayNow){
                return redirect('admin/add_movie')->with('year', 'Date cannot be greater than the current date!');
            }else{
                if($year>$yearNow){
                    return redirect('admin/add_movie')->with('year', 'Year cannot be greater than the current year!');
                }else{
                    $filenameWithExt = $request->file('moviePicture')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                    $extention = $request->file('moviePicture')->getClientOriginalExtension();
                    $fileNameToStore = $filename.'.'.$extention;

                    $path = $request->file('moviePicture')->move(
                        'images', $fileNameToStore
                    );

                    DB::table('movie')->insert([
                        [
                            'mov_title'=>$request->movieTitle,
                            'mov_year'=>$request->year,
                            'mov_time'=>$request->time,
                            'mov_lang'=>$request->language,
                            'mov_rel'=>$request->yearManufacture,
                            'mov_rel_country'=>$request->releaseCountry,
                            'mov_img'=>$path,
                            'mov_description'=>$request->movieDescription,
                            'nums_start'=>$request->movieRating
                        ]
                    ]);
                    return redirect('admin/add_movie')->with('thongbao', 'Successfull!');
                }
            }
        }
    }

    public function showUserByID(Request $request){
        if ($request->has(['id'])){
            $user = User::get_user_by_id($request->id);
            return view('admin.edit_users',compact('user'));
        }

    }
    public function showDetailsMovie(Request $request){
        //dd($request->mov_id);
        try{
            if($request->has(['mov_id'])){
                if($request->hasFile(['moviePicture'])){
                    $filenameWithExt = $request->file('moviePicture')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                    $extention = $request->file('moviePicture')->getClientOriginalExtension();
                    $fileNameToStore = $filename.'.'.$extention;

                    $path = $request->file('moviePicture')->move(
                        'images', $fileNameToStore
                    );
                    DB::table('movie')
                        ->where('mov_id', $request->mov_id)
                        ->update([
                            [
                                'mov_title'=>$request->movieTitle,
                                'mov_year'=>$request->year,
                                'mov_time'=>$request->time,
                                'mov_lang'=>$request->language,
                                'mov_rel'=>$request->yearManufacture,
                                'mov_rel_country'=>$request->releaseCountry,
                                'mov_img'=>$path,
                                'mov_description'=>$request->movieDescription,
                                'nums_start'=>0
                            ]
                        ]);
                    $movie = Movie::get_movie_by_id($request->mov_id);
                    $movieActor = MovieCast::get_all_cast_by_movie_id($request->mov_id);
                    $movieDirector = MovieDirector::get_all_director_by_movie_id($request->mov_id);
                    $movieGenres = MovieGenres::get_all_genres_by_movie_id($request->mov_id);
                    $allGenres = MovieGenres::get_all_genres();
                    $allDirector = MovieDirector::get_all_director();
                    $allCast = MovieCast::get_all_cast();

                    $a=0;
                    $allDirection = MovieDirection::get_all_direction_by_movie_id($request->mov_id);
                    dd($a);
                    $arrayNameDirector = $request->nameDirector;
                    for($i=0; $i<count($arrayNameDirector); $i++){
                        $arrayNameDirector[$i] = trim($arrayNameDirector);
                    }

                    for($run=0; $run<count($arrayNameDirector); $run++){
                        $arrayNameDirectorTmp = explode(' ',$arrayNameDirector[$run]);
                        if(count($arrayNameDirectorTmp)==1){
                            $arrayNameDirectorTmp[1]='';
                        }else{
                            $resultsSearch = MovieDirector::get_all_director_by_name($arrayNameDirectorTmp[0], $arrayNameDirectorTmp[1]);

                        }
                    }
                    //$nameTmp = trim($request->);
                }else{
                    if($request->has(['addNameCast'])){
                        $arrayName =  explode(' ',$request->addNameCast);
                        DB::table('movie_actor')->insert([
                            ['act_fname'=>$arrayName[0],'act_lname'=>$arrayName[1],'act_gender'=>$request->addCastGender]
                        ]);
                        $movie = Movie::get_movie_by_id($request->mov_id);
                        $movieActor = MovieCast::get_all_cast_by_movie_id($request->mov_id);
                        $movieDirector = MovieDirector::get_all_director_by_movie_id($request->mov_id);
                        $movieGenres = MovieGenres::get_all_genres_by_movie_id($request->mov_id);
                        $allGenres = MovieGenres::get_all_genres();
                        $allDirector = MovieDirector::get_all_director();
                        $allCast = MovieCast::get_all_cast();
                        return view('admin.editMovieDetails', compact('movie','movieActor','movieDirector','movieGenres','allDirector','allGenres','allCast'));
                    }else if($request->has(['addGenres'])){
                        DB::table('genres')->insert([
                            ['gen_title'=>$request->addGenres]
                        ]);

                        $movie = Movie::get_movie_by_id($request->mov_id);
                        $movieActor = MovieCast::get_all_cast_by_movie_id($request->mov_id);
                        $movieDirector = MovieDirector::get_all_director_by_movie_id($request->mov_id);
                        $movieGenres = MovieGenres::get_all_genres_by_movie_id($request->mov_id);
                        $allGenres = MovieGenres::get_all_genres();
                        $allDirector = MovieDirector::get_all_director();
                        $allCast = MovieCast::get_all_cast();
                        return view('admin.editMovieDetails', compact('movie','movieActor','movieDirector','movieGenres','allDirector','allGenres','allCast'));
                    }else if($request->has(['firstNameDirector'])){
                        DB::table('director')->insert([
                            ['dir_fname'=>$request->firstNameDirector,'dir_lname'=>$request->lastNameDirector]
                        ]);

                        $movie = Movie::get_movie_by_id($request->mov_id);
                        $movieActor = MovieCast::get_all_cast_by_movie_id($request->mov_id);
                        $movieDirector = MovieDirector::get_all_director_by_movie_id($request->mov_id);
                        $movieGenres = MovieGenres::get_all_genres_by_movie_id($request->mov_id);
                        $allGenres = MovieGenres::get_all_genres();
                        $allDirector = MovieDirector::get_all_director();
                        $allCast = MovieCast::get_all_cast();
                        return view('admin.editMovieDetails', compact('movie','movieActor','movieDirector','movieGenres','allDirector','allGenres','allCast'));
                    }else if($request->has(['nameDirector'])){
                        DB::table('movie')
                            ->where('mov_id', $request->mov_id)
                            ->update([
                                [
                                    'mov_title'=>$request->movieTitle,
                                    'mov_year'=>$request->year,
                                    'mov_time'=>$request->time,
                                    'mov_lang'=>$request->language,
                                    'mov_rel'=>$request->yearManufacture,
                                    'mov_rel_country'=>$request->releaseCountry,
                                    'mov_description'=>$request->movieDescription,
                                    'nums_start'=>0
                                ]
                            ]);



                        //Add Director
                        $arrayNameDirector = $request->nameDirector;

                        for($i=0; $i<count($arrayNameDirector); $i++){
                            $arrayNameDirector[$i] = trim($arrayNameDirector[$i]);
                        }
                        $allDirection = MovieDirection::get_all_direction_by_movie_id($request->mov_id);

                        if(count($arrayNameDirector)==count($allDirection)){
                            if(count($arrayNameDirector)==1&&count($allDirection)==1){
                                $arrayDirectorTmp1 = array();
                                $allDirectionTmp1 = $allDirection;

                                $arrayNameDirectorTmp1 = explode(' ',$arrayNameDirector[0]);

                                if(count($arrayNameDirectorTmp1)==1){
                                    $arrayNameDirectorTmp1[1]='';
                                }
                                $resultsSearch1 = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmp1[0], $arrayNameDirectorTmp1[1]);

                                //khong tim thay kết quả
                                if(count($resultsSearch1)==0){
                                    DB::table('director')->insert([
                                        ['dir_fname'=>$arrayNameDirectorTmp1[0],'dir_lname'=>$arrayNameDirectorTmp1[1]]
                                    ]);
                                    $newValue = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmp1[0], $arrayNameDirectorTmp1[1]);

                                    DB::table('movie_direction')->insert([
                                        ['dir_id'=>$newValue[(count($newValue)-1)]->dir_id,'mov_id'=>$request->mov_id]
                                    ]);
                                }else if(count($resultsSearch1)>0){
                                    for($t=0; $t<count($resultsSearch1); $t++){
                                        $arrayDirectorTmp1[]=$resultsSearch1[$t];
                                    }
                                }

                                for($c=0; $c<count($arrayDirectorTmp1); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allDirectionTmp1); $cc++){
                                        if($arrayDirectorTmp1[$c]->dir_id==$allDirectionTmp1[$cc]->dir_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>($arrayDirectorTmp1[$c]->dir_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }
                                //xong
                            }else {
                                $allDirectionTmp2 = $allDirection;
                                $arrayDirectorTmp2 = array();

                                //add value mới nếu có, nếu đã tồn tại thì add vào mảng
                                for($a=0; $a<count($arrayNameDirector); $a++){
                                    $arrayNameDirectorTmpTmp1 = explode(' ',$arrayNameDirector[$a]);
                                    if(count($arrayNameDirectorTmpTmp1)==1){
                                        $arrayNameDirectorTmpTmp1[1]='';
                                    }

                                    $resultsSearch22 = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmpTmp1[0], $arrayNameDirectorTmpTmp1[1]);

                                    if(count($resultsSearch22)==0){
                                        DB::table('director')->insert([
                                            ['dir_fname'=>$arrayNameDirectorTmpTmp1[0],'dir_lname'=>$arrayNameDirectorTmpTmp1[1]]
                                        ]);
                                        $newValue = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmpTmp1[0],$arrayNameDirectorTmpTmp1[1]);
                                        $arrayDirectorTmp2[]=$newValue[(count($newValue)-1)];
                                    }else if(count($resultsSearch22)>0){
                                        for($t=0; $t<count($resultsSearch22); $t++){
                                            $arrayDirectorTmp2[]=$resultsSearch22[$t];
                                        }
                                    }
                                }

                                //check exist Nếu exist thì xoá khỏi arrayDirectorTmp
                                for($c=0; $c<count($arrayDirectorTmp2); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allDirectionTmp2); $cc++){
                                        if($arrayDirectorTmp2[$c]->dir_id==$allDirectionTmp2[$cc]->dir_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>($arrayDirectorTmp2[$c]->dir_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }

                            }

                        }else{
                            //TH: 2 input <>
                            if(count($allDirection)==0&&count($arrayNameDirector)>=1){
                                for($i=0; $i<count($arrayNameDirector); $i++){
                                    $arrayNameDirectorTmp3 = explode(' ',$arrayNameDirector[$i]);
                                    if(count($arrayNameDirectorTmp3)==1){
                                        $arrayNameDirectorTmp3[1]='';
                                    }
                                    $outputTmp = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmp3[0], $arrayNameDirectorTmp3[1]);

                                    if(count($outputTmp)==0){
                                        DB::table('director')->insert([
                                            ['dir_fname'=>$arrayNameDirectorTmp3[0],'dir_lname'=>$arrayNameDirectorTmp3[1]]
                                        ]);
                                        $newValue = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmp3[0],$arrayNameDirectorTmp3[1]);

                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>$newValue[(count($newValue)-1)]->dir_id,'mov_id'=>$request->mov_id]
                                        ]);
                                    }else{
                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>$outputTmp[0]->dir_id,'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }//xong
                            }else if(count($allDirection)==1&&count($arrayNameDirector)>1){

                                $allDirectionTmp = $allDirection;
                                $arrayDirectorTmp = array();
                                //echo $arrayNameDirector[1];
                                for($a=0; $a<count($arrayNameDirector); $a++){
                                    $arrayNameDirectorTmpTmp = explode(' ',$arrayNameDirector[$a]);
                                    if(count($arrayNameDirectorTmpTmp)==1){
                                        $arrayNameDirectorTmpTmp[1]='';
                                    }

                                    $resultsSearch22 = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmpTmp[0], $arrayNameDirectorTmpTmp[1]);

                                    if(count($resultsSearch22)==0){
                                        DB::table('director')->insert([
                                            ['dir_fname'=>$arrayNameDirectorTmpTmp[0],'dir_lname'=>$arrayNameDirectorTmpTmp[1]]
                                        ]);
                                        $newValue = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmpTmp[0],$arrayNameDirectorTmpTmp[1]);
                                        $arrayDirectorTmp[]=$newValue[(count($newValue)-1)];
                                    }else if(count($resultsSearch22)>0){
                                        for($t=0; $t<count($resultsSearch22); $t++){
                                            $arrayDirectorTmp[]=$resultsSearch22[$t];
                                        }
                                    }
                                }
                                //check exist Nếu exist thì xoá khỏi arrayDirectorTmp
                                for($c=0; $c<count($arrayDirectorTmp); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allDirectionTmp); $cc++){
                                        if($arrayDirectorTmp[$c]->dir_id==$allDirectionTmp[$cc]->dir_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>($arrayDirectorTmp[$c]->dir_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }//xong

                            }else if(count($allDirection)>1){
                                $allDirectionTmp = $allDirection;
                                $arrayDirectorTmp = array();
                                //echo $arrayNameDirector[1];
                                for($a=0; $a<count($arrayNameDirector); $a++){
                                    $arrayNameDirectorTmpTmp = explode(' ',$arrayNameDirector[$a]);
                                    if(count($arrayNameDirectorTmpTmp)==1){
                                        $arrayNameDirectorTmpTmp[1]='';
                                    }

                                    $resultsSearch22 = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmpTmp[0], $arrayNameDirectorTmpTmp[1]);

                                    if(count($resultsSearch22)==0){
                                        DB::table('director')->insert([
                                            ['dir_fname'=>$arrayNameDirectorTmpTmp[0],'dir_lname'=>$arrayNameDirectorTmpTmp[1]]
                                        ]);
                                        $newValue = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmpTmp[0],$arrayNameDirectorTmpTmp[1]);
                                        $arrayDirectorTmp[]=$newValue[(count($newValue)-1)];
                                    }else if(count($resultsSearch22)>0){
                                        for($t=0; $t<count($resultsSearch22); $t++){
                                            $arrayDirectorTmp[]=$resultsSearch22[$t];
                                        }
                                    }
                                }
                                //check exist Nếu exist thì xoá khỏi arrayDirectorTmp
                                for($c=0; $c<count($arrayDirectorTmp); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allDirectionTmp); $cc++){
                                        if($arrayDirectorTmp[$c]->dir_id==$allDirectionTmp[$cc]->dir_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>($arrayDirectorTmp[$c]->dir_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }//xong
                            }
                        }
                        //End add Director

                        //add Genres
                        $allGenresFromUser = $request->nameGendres;
                        //dd($allGenresFromUser);
                        for($i=0; $i<count($allGenresFromUser); $i++){
                            $allGenresFromUser[$i] = trim($allGenresFromUser[$i]);
                        }
                        $allGenresfromDatabase = MovieGenres::get_genres_by_mov_id($request->mov_id);
                        //dd($allGenresfromDatabase);
                        if(count($allGenresFromUser)==count($allGenresfromDatabase)){
                            if(count($allGenresFromUser)==1 && count($allGenresfromDatabase)==1){
                                $arrayGenresTmp1 = array();
                                $allGenresTmp1 = $allGenresfromDatabase;

                                $resultsSearch1 = MovieGenres::get_genres_by_name($allGenresFromUser[0]);

                                //khong tim thay kết quả
                                if(count($resultsSearch1)==0){
                                    DB::table('genres')->insert([
                                        ['gen_title'=>$allGenresFromUser[0]->gen_title]
                                    ]);
                                    $newValue = MovieGenres::get_genres_by_name($allGenresFromUser[0]);

                                    DB::table('movie_genres')->insert([
                                        ['gen_id'=>$newValue[(count($newValue)-1)]->gen_id,'mov_id'=>$request->mov_id]
                                    ]);
                                }else if(count($resultsSearch1)>0){
                                    for($t=0; $t<count($resultsSearch1); $t++){
                                        $arrayGenresTmp1[]=$resultsSearch1[$t];
                                    }
                                }

                                for($c=0; $c<count($arrayGenresTmp1); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allGenresTmp1); $cc++){
                                        if($arrayGenresTmp1[$c]->gen_id==$allGenresTmp1[$cc]->gen_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_genres')->insert([
                                            ['gen_id'=>($arrayGenresTmp1[$c]->gen_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }
                                //xong
                            }else {
                                $allGenresTmp2 = $allGenresfromDatabase;
                                $arrayGenresTmp2 = array();

                                //add value mới nếu có, nếu đã tồn tại thì add vào mảng
                                for($a=0; $a<count($allGenresFromUser); $a++){

                                    $resultsSearch22 = MovieGenres::get_genres_by_name($allGenresFromUser[$a]);

                                    if(count($resultsSearch22)==0){
                                        DB::table('genres')->insert([
                                            ['gen_title'=>$allGenresFromUser[$a]]
                                        ]);
                                        $newValue = MovieGenres::get_genres_by_name($allGenresFromUser[$a]);
                                        $arrayGenresTmp2[]=$newValue[(count($newValue)-1)];
                                    }else if(count($resultsSearch22)>0){
                                        for($t=0; $t<count($resultsSearch22); $t++){
                                            $arrayGenresTmp2[]=$resultsSearch22[$t];
                                        }
                                    }
                                }

                                //check exist Nếu exist thì xoá khỏi arrayDirectorTmp
                                for($c=0; $c<count($arrayGenresTmp2); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allGenresTmp2); $cc++){
                                        if($arrayGenresTmp2[$c]->gen_id==$allGenresTmp2[$cc]->gen_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_genres')->insert([
                                            ['gen_id'=>($arrayGenresTmp2[$c]->gen_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }

                            }

                        }else{
                            //TH: 2 input <>
                            if(count($allGenresfromDatabase)==0&&count($allGenresFromUser)>=1){
                                //dd(count($allGenresFromUser));
                                for($temp=0; $temp<count($allGenresFromUser); $temp++){

                                    $outputTmp = MovieGenres::get_genres_by_name($allGenresFromUser[$temp]);
                                    //dd(outputTmp);
                                    if(count($outputTmp)==0){
                                        DB::table('genres')->insert([
                                            ['gen_title'=>$allGenresFromUser[$temp]]
                                        ]);
                                        $newValue = MovieGenres::get_genres_by_name($allGenresFromUser[$temp]);

                                        DB::table('movie_genres')->insert([
                                            ['mov_id'=>$request->mov_id,'gen_id'=>$newValue[(count($newValue)-1)]->gen_id]
                                        ]);
                                    }else{

                                        DB::table('movie_genres')->insert([
                                            ['mov_id'=>$request->mov_id,'gen_id'=>$outputTmp[0]->gen_id]
                                        ]);

                                    }
                                }//xong
                            }else if(count($allGenresfromDatabase)==1&&count($allGenresFromUser)>1){

                                $allGenresTmp = $allGenresfromDatabase;
                                $arrayGenresTmp = array();
                                //echo $arrayNameDirector[1];
                                for($a=0; $a<count($allGenresFromUser); $a++){

                                    $resultsSearch22 = MovieGenres::get_genres_by_name($allGenresFromUser[$a]);

                                    if(count($resultsSearch22)==0){
                                        DB::table('gerens')->insert([
                                            ['gen_title'=>$allGenresFromUser[$a]]
                                        ]);
                                        $newValue = MovieGenres::get_genres_by_name($allGenresFromUser[$a]);
                                        $arrayGenresTmp[]=$newValue[(count($newValue)-1)];
                                    }else if(count($resultsSearch22)>0){
                                        for($t=0; $t<count($resultsSearch22); $t++){
                                            $arrayGenresTmp[]=$resultsSearch22[$t];
                                        }
                                    }
                                }
                                //check exist Nếu exist thì xoá khỏi arrayDirectorTmp
                                for($c=0; $c<count($arrayGenresTmp); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allGenresTmp); $cc++){
                                        if($arrayGenresTmp[$c]->gen_id==$allGenresTmp[$cc]->gen_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_genres')->insert([
                                            ['gen_id'=>($arrayGenresTmp[$c]->gen_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }//xong

                            }else if(count($allGenresfromDatabase)>1){
                                $allGenresTmp = $allDirection;
                                $arrayGenresTmp = array();
                                //echo $arrayNameDirector[1];
                                for($a=0; $a<count($allGenresFromUser); $a++){
                                    $resultsSearch22 = MovieGenres::get_genres_by_name($allGenresFromUser[$a]);

                                    if(count($resultsSearch22)==0){
                                        DB::table('genres')->insert([
                                            ['gen_title'=>$allGenresFromUser[$a]]
                                        ]);
                                        $newValue = MovieGenres::get_genres_by_name($allGenresFromUser[$a]);
                                        $arrayGenresTmp[]=$newValue[(count($newValue)-1)];
                                    }else if(count($resultsSearch22)>0){
                                        for($t=0; $t<count($resultsSearch22); $t++){
                                            $arrayGenresTmp[]=$resultsSearch22[$t];
                                        }
                                    }
                                }
                                //check exist Nếu exist thì xoá khỏi arrayDirectorTmp
                                for($c=0; $c<count($arrayGenresTmp); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allGenresTmp); $cc++){
                                        if($arrayGenresTmp[$c]->gen_id==$allGenresTmp[$cc]->gen_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_genres')->insert([
                                            ['gen_id'=>($arrayGenresTmp[$c]->gen_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }//xong
                            }
                        }
                        //end and Genres

                        //add cast
                        /*$arrayNameCastFromUser = $request->nameCast;
                        $arrayGenderFromUser = $request->castGender;

                        for($i=0; $i<count($arrayNameCastFromUser); $i++){
                            $arrayNameCastFromUser[$i] = trim($arrayNameCastFromUser[$i]);
                        }
                        $allCastFromDatabase = MovieCast::get_all_cast_by_movie_id($request->mov_id);

                        if(count($arrayNameCastFromUser)==count($allCastFromDatabase)){
                            if(count($arrayNameCastFromUser)==1&&count($allCastFromDatabase)==1){
                                $arrayDirectorTmp1 = array();
                                $allCastTmp1 = $allCastFromDatabase;

                                $arrayNameCastTmp1 = explode(' ',$arrayNameCastFromUser[0]);

                                if(count($arrayNameCastTmp1)==1){
                                    $arrayNameCastTmp1[1]='';
                                }
                                $resultsSearch1 = MovieDirector::get_all_director_by_fname_and_lname($arrayNameCastTmp1[0], $arrayNameCastTmp1[1]);

                                //khong tim thay kết quả
                                if(count($resultsSearch1)==0){
                                    DB::table('director')->insert([
                                        ['dir_fname'=>$arrayNameCastTmp1[0],'dir_lname'=>$arrayNameCastTmp1[1]]
                                    ]);
                                    $newValue = MovieDirector::get_all_director_by_fname_and_lname($arrayNameCastTmp1[0], $arrayNameCastTmp1[1]);

                                    DB::table('movie_direction')->insert([
                                        ['dir_id'=>$newValue[(count($newValue)-1)]->dir_id,'mov_id'=>$request->mov_id]
                                    ]);
                                }else if(count($resultsSearch1)>0){
                                    for($t=0; $t<count($resultsSearch1); $t++){
                                        $arrayDirectorTmp1[]=$resultsSearch1[$t];
                                    }
                                }

                                for($c=0; $c<count($arrayDirectorTmp1); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allDirectionTmp1); $cc++){
                                        if($arrayDirectorTmp1[$c]->dir_id==$allDirectionTmp1[$cc]->dir_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>($arrayDirectorTmp1[$c]->dir_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }
                                //xong
                            }else {
                                $allDirectionTmp2 = $allCastFromDatabase;
                                $arrayDirectorTmp2 = array();

                                //add value mới nếu có, nếu đã tồn tại thì add vào mảng
                                for($a=0; $a<count($arrayNameCastFromUser); $a++){
                                    $arrayNameDirectorTmpTmp1 = explode(' ',$arrayNameCastFromUser[$a]);
                                    if(count($arrayNameDirectorTmpTmp1)==1){
                                        $arrayNameDirectorTmpTmp1[1]='';
                                    }

                                    $resultsSearch22 = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmpTmp1[0], $arrayNameDirectorTmpTmp1[1]);

                                    if(count($resultsSearch22)==0){
                                        DB::table('director')->insert([
                                            ['dir_fname'=>$arrayNameDirectorTmpTmp1[0],'dir_lname'=>$arrayNameDirectorTmpTmp1[1]]
                                        ]);
                                        $newValue = MovieDirector::get_all_director_by_fname_and_lname($request->mov_id);
                                        $arrayDirectorTmp2[]=$newValue[(count($newValue)-1)];
                                    }else if(count($resultsSearch22)>0){
                                        for($t=0; $t<count($resultsSearch22); $t++){
                                            $arrayDirectorTmp2[]=$resultsSearch22[$t];
                                        }
                                    }
                                }

                                //check exist Nếu exist thì xoá khỏi arrayDirectorTmp
                                for($c=0; $c<count($arrayDirectorTmp2); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allDirectionTmp2); $cc++){
                                        if($arrayDirectorTmp2[$c]->dir_id==$allDirectionTmp2[$cc]->dir_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>($arrayDirectorTmp2[$c]->dir_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }

                            }

                        }else{
                            //TH: 2 input <>
                            if(count($allCastFromDatabase)==0&&count($arrayNameCastFromUser)>=1){
                                for($i=0; $i<count($arrayNameCastFromUser); $i++){
                                    $arrayNameDirectorTmp3 = explode(' ',$arrayNameCastFromUser[$i]);
                                    if(count($arrayNameDirectorTmp3)==1){
                                        $arrayNameDirectorTmp3[1]='';
                                    }
                                    $outputTmp = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmp3[0], $arrayNameDirectorTmp3[1]);

                                    if(count($outputTmp)==0){
                                        DB::table('director')->insert([
                                            ['dir_fname'=>$arrayNameDirectorTmp3[0],'dir_lname'=>$arrayNameDirectorTmp3[1]]
                                        ]);
                                        $newValue = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmp3[0], $arrayNameDirectorTmp3[1]);

                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>$newValue[(count($newValue)-1)]->dir_id,'mov_id'=>$request->mov_id]
                                        ]);
                                    }else{
                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>$outputTmp[0]->dir_id,'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }//xong
                            }else if(count($allCastFromDatabase)==1&&count($arrayNameCastFromUser)>1){

                                $allDirectionTmp = $allCastFromDatabase;
                                $arrayDirectorTmp = array();
                                //echo $arrayNameDirector[1];
                                for($a=0; $a<count($arrayNameCastFromUser); $a++){
                                    $arrayNameDirectorTmpTmp = explode(' ',$arrayNameCastFromUser[$a]);
                                    if(count($arrayNameDirectorTmpTmp)==1){
                                        $arrayNameDirectorTmpTmp[1]='';
                                    }

                                    $resultsSearch22 = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmpTmp[0], $arrayNameDirectorTmpTmp[1]);

                                    if(count($resultsSearch22)==0){
                                        DB::table('director')->insert([
                                            ['dir_fname'=>$arrayNameDirectorTmpTmp[0],'dir_lname'=>$arrayNameDirectorTmpTmp[1]]
                                        ]);
                                        $newValue = MovieDirector::get_all_director_by_fname_and_lname($request->mov_id);
                                        $arrayDirectorTmp[]=$newValue[(count($newValue)-1)];
                                    }else if(count($resultsSearch22)>0){
                                        for($t=0; $t<count($resultsSearch22); $t++){
                                            $arrayDirectorTmp[]=$resultsSearch22[$t];
                                        }
                                    }
                                }
                                //check exist Nếu exist thì xoá khỏi arrayDirectorTmp
                                for($c=0; $c<count($arrayDirectorTmp); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allDirectionTmp); $cc++){
                                        if($arrayDirectorTmp[$c]->dir_id==$allDirectionTmp[$cc]->dir_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>($arrayDirectorTmp[$c]->dir_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }//xong

                            }else if(count($allCastFromDatabase)>1){
                                $allDirectionTmp = $allCastFromDatabase;
                                $arrayDirectorTmp = array();
                                //echo $arrayNameDirector[1];
                                for($a=0; $a<count($arrayNameCastFromUser); $a++){
                                    $arrayNameDirectorTmpTmp = explode(' ',$arrayNameCastFromUser[$a]);
                                    if(count($arrayNameDirectorTmpTmp)==1){
                                        $arrayNameDirectorTmpTmp[1]='';
                                    }

                                    $resultsSearch22 = MovieDirector::get_all_director_by_fname_and_lname($arrayNameDirectorTmpTmp[0], $arrayNameDirectorTmpTmp[1]);

                                    if(count($resultsSearch22)==0){
                                        DB::table('director')->insert([
                                            ['dir_fname'=>$arrayNameDirectorTmpTmp[0],'dir_lname'=>$arrayNameDirectorTmpTmp[1]]
                                        ]);
                                        $newValue = MovieDirector::get_all_director_by_fname_and_lname($request->mov_id);
                                        $arrayDirectorTmp[]=$newValue[(count($newValue)-1)];
                                    }else if(count($resultsSearch22)>0){
                                        for($t=0; $t<count($resultsSearch22); $t++){
                                            $arrayDirectorTmp[]=$resultsSearch22[$t];
                                        }
                                    }
                                }
                                //check exist Nếu exist thì xoá khỏi arrayDirectorTmp
                                for($c=0; $c<count($arrayDirectorTmp); $c++){
                                    $exist = false;
                                    for($cc=0; $cc<count($allDirectionTmp); $cc++){
                                        if($arrayDirectorTmp[$c]->dir_id==$allDirectionTmp[$cc]->dir_id){
                                            $exist = true;
                                        }
                                    }
                                    if($exist==false){
                                        DB::table('movie_direction')->insert([
                                            ['dir_id'=>($arrayDirectorTmp[$c]->dir_id),'mov_id'=>$request->mov_id]
                                        ]);
                                    }
                                }//xong
                            }
                        }*/
                        //end add cast

                        $movie = Movie::get_movie_by_id($request->mov_id);
                        $movieActor = MovieCast::get_all_cast_by_movie_id($request->mov_id);
                        $movieDirector = MovieDirector::get_all_director_by_movie_id($request->mov_id);
                        $movieGenres = MovieGenres::get_all_genres_by_movie_id($request->mov_id);
                        $allGenres = MovieGenres::get_all_genres();
                        $allDirector = MovieDirector::get_all_director();
                        $allCast = MovieCast::get_all_cast();
                        return view('admin.editMovieDetails', compact('movie','movieActor','movieDirector','movieGenres','allDirector','allGenres','allCast'));

                    }else{
                        $movie = Movie::get_movie_by_id($request->mov_id);
                        $movieActor = MovieCast::get_all_cast_by_movie_id($request->mov_id);
                        $movieDirector = MovieDirector::get_all_director_by_movie_id($request->mov_id);
                        $movieGenres = MovieGenres::get_all_genres_by_movie_id($request->mov_id);
                        $allGenres = MovieGenres::get_all_genres();
                        $allDirector = MovieDirector::get_all_director();
                        $allCast = MovieCast::get_all_cast();
                        return view('admin.editMovieDetails', compact('movie','movieActor','movieDirector','movieGenres','allDirector','allGenres','allCast'));
                    }
                }
            }
        } catch (\Exception $e) {
            return view('error_page.404page');
        }
    }

    public function postFile(Request $request){
        if($request->hasFile('myFile')){
            $file = $request->file('myFile');
            $file->move(
                $request->directory,
                $request->name
            );
        }else{
            echo "Chua co file";
        }
    }

    public function postChapter(Request $request){
        $this->validate($request,
        [
            'nameChapter'=>'required|min:9|max:100'
        ],
        [
            'nameChapter.required'=>'This field cannot be empty!',
            'nameChapter.min'=>'Name must be at least 9 characters and at most 100 characters.',
            'nameChapter.max'=>'Name must be at least 9 characters and at most 100 characters.'
        ]);
    }

    public function replaceFilm(Request $request)
    {
        //kiểm tra có tồn tại myFile ?
        if($request->hasFile('myFile'))
        {
        //lưu file
            $request->file('myFile')->move(
                $request->directory, //nơi cần lưu
                $request->name //tên file
            );
        }
        else
        {
            echo "Chưa có file";
        }
        $movie = Movie::get_movie_by_id($request->MovieID);
        $chapters = MovieChapter::get_all_chapter_by_movie_id($request->MovieID);
//            dd($movie);
        return view('admin.add_chapter',compact('movie','chapters'));
    }

//    public function deleteChapter(Request $request){
//        if($request->has('chapter_link_delete'))
//        File::delete($request->chapter_link_delete);
//        MovieChapter::delete_chapter_by_chapter_link($request->chapter_link_delete);
//        $movie = Movie::get_movie_by_id($request->MovieID);
//        $chapters = MovieChapter::get_all_chapter_by_movie_id($request->MovieID);
////            dd($movie);
//        return view('admin.edit_movie',compact('movie','chapters'));
//    }
}

