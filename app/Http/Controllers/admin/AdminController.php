<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\MovieController;
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

class AdminController extends Controller
{


    public function table(){
        try {

            $movies = DB::table('movie')->get();
//            dd($rating);
            return view('admin.table', compact('movies'));

        } catch (\Exception $e) {
            return view('error_page.404page');
        }
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

            DB::table('movie_chapter')->insert([
                [
                    'mov_id'=>$movie->mov_id,
                    'chapter_nums'=>$request->chapterNumbers,
                    'chapter_name'=>$request->nameChapter,
                    'chapter_link'=>$path
                ]
            ]);

            return view('admin.add_chapter_successfull', compact('movie'));
        }
    }

    public function postMovie(Request $request){
        $year = (int) $request->year;
        $checkDate = (int)$request->yearManufacture;
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        echo $dt->toDateString();
        /*if($checkDate==0){
            return 'ngu';
        }else{
            echo $checkDate;
        }*/
        /*$this->validate($request,
            [
                'movieTitle'=>'required|min:3|max:50',
                'year'=>'required|numeric',
                'language'=>'required|min:2|max:5'

            ],
            [
                'movieTitle.required'=>'Title field cannot be empty!',
                'movieTitle.min'=>'Title must be at least 3 characters and at most 50 characters.',
                'movieTitle.max'=>'Title must be at least 3 characters and at most 50 characters.',
                'year.required'=>'Year of manufacture field cannot be empty!',
                'year.numeric'=>'Year Invalid!',
                'language.required'=>'language field cannot be empty!',
                'language.min'=>'language must be at least 2 characters and at most 5 characters.',
                'language.max'=>'language must be at least 2 characters and at most 5 characters.',

            ]
        );

        return redirect('admin/add_movie')->with('thongbao', 'Successfull!');*/
        //echo $request->movieTitle;
    }

    public function showUserByID(Request $request){
        if ($request->has(['id'])){
            $user = User::get_user_by_id($request->id);
            return view('admin.edit_users',compact('user'));
        }

    }
    public function showDetailsMovie(Request $request){
        try{
            if($request->has(['chapter_id'])){
                $chapters = MovieChapter::get_chapter_by_chapter_nums($request->chapter_id);
                return view('admin.editMovieDetails', compact('chapters'));
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

    public function deleteChapter(Request $request){
        if($request->has('chapter_link_delete'))
        File::delete($request->chapter_link_delete);
        MovieChapter::delete_chapter_by_chapter_link($request->chapter_link_delete);
        $movie = Movie::get_movie_by_id($request->MovieID);
        $chapters = MovieChapter::get_all_chapter_by_movie_id($request->MovieID);
//            dd($movie);
        return view('admin.edit_movie',compact('movie','chapters'));
    }
}

