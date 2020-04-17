<?php

namespace App\Http\Controllers;

use App\Movie;
use App\MovieCast;
use App\MovieChapter;
use Cassandra\Session;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{


    public function getMovie($mov_title)
    {
        //      "this line for decrypt $id if you encrypt in url" $id = Crypt::decrypt($id);


        try {
            try {
                $user = Auth::user();

            }
            catch (\Exception $exception){
                $user  = null;

            }
            $movie = Movie::get_movie_by_title($mov_title);
            $id = $movie->mov_id;
            $act = $this->getAct($id);
            $dir = $this->getDir($id);
            $genres = $this->getGenres($id);

            return view('movie_v2.single', compact('movie', 'act', 'dir', 'genres','user'));
        } catch (\Exception $e) {
            return view('error_page.404page');
        }
    }

    public function getView($movie_id)
    {

    }

    public function getChapter($mov_title, $chapter_nums)
    {

        try {
            $movie = Movie::get_movie_by_title($mov_title);
            $mov_id = $movie->mov_id;
            $chapter = MovieChapter:: get_chapter_by_chapter_nums_movie_id($chapter_nums, $mov_id);
            $all_chapter = MovieChapter::get_all_chapter_by_movie_id($mov_id);

            return view('movie_v2.watch', compact('chapter', 'movie', 'all_chapter'));
        } catch (\Exception $e) {
            return view('error_page.404page');
        }

    }

    public function getAct($id)
    {
        $act = MovieCast::get_all_cast_by_movie_id($id);
//        dd($act);
        return $act;
    }

    public function getDir($id)
    {
        try {

            $dir = MovieCast::get_all_dir_by_movie_id($id);
//        dd($act);
            return $dir;
        } catch (\Exception $e) {
            return view('error_page.404page');
        }
    }

    public function getGenres($id)
    {

        try {
            $genres = Movie::get_all_genres_by_movie_id($id);
//        dd($act);
            return $genres;
        } catch (\Exception $e) {
            return view('error_page.404page');
        }
    }

    /**
     * @return array
     */
    public function getReview()
    {
        try {
            try {
                $user = Auth::user();

            }
            catch (\Exception $exception){
                $user  = null;

            }
            $movies = DB::table('movie')->paginate(12);
            $genres = $this->getAllGenres();
            $genre_select = "All";
//            dd($rating);

            return view('movie_v2.review', compact('movies', 'genres', 'genre_select','user'));

        } catch (\Exception $e) {
            return view('error_page.404page');
        }
    }

    public static function getRating($movie_id)
    {
        $sum_rate = 0;
        $rated = DB::table('movie_rating')->where('mov_id', $movie_id)->get();
        foreach ($rated as $rate) {
            $sum_rate += $rate->rev_starts;
        }
        if (count($rated) != 0)
            return $sum_rate / (count($rated) * 5) *100 ;
        else return 0;
    }

    public static function getRatings($movie_id){
        $sum_rate = 0;
        $rated = DB::table('movie_rating')->where('mov_id', $movie_id)->get();
        foreach ($rated as $rate) {
            $sum_rate += $rate->rev_starts;
        }
        if (count($rated) != 0)
            return $sum_rate / count($rated) ;
        else return 0;
    }
    public static function getAllGenres()
    {
        $db = Movie::get_all_genres();
        return $db;
    }

    public function getByGenTitle($gen_title)
    {
        try {
            if ($gen_title == "All") return $this->getReview();
            $genres = $this->getAllGenres();
            $genre_select = $gen_title;
            $movies = DB::table('movie')
                ->join('movie_genres', 'movie_genres.mov_id', '=', 'movie.mov_id')
                ->join('genres', 'movie_genres.gen_id', '=', 'genres.gen_id')
                ->where('genres.gen_title', '=', $gen_title)
                ->paginate(12);

//            dd($genre_select);
            return view('movie_v2.review', compact('movies', 'genres', 'genre_select'));

        } catch (\Exception $e) {
            return view('error_page.404page');
//                return $e;
        }
    }

    public static function check_selected($genre, $genre_select)
    {
//        if($genre_select == null){
//            $genre_select = "All";
//        }
        if ($genre == $genre_select) {
            echo "selected";
        }
    }
    public static  function getNumMoVie(){
        $ddb = DB::table('movie')
            ->select('mov_id')
            ->get();
        return $ddb->count();
    }
    public static function get_top_x_movie_just_update($x_top){
        $ddb =  DB::table('movie_chapter')
            ->select('mov_id')
            ->distinct()
            ->orderByDesc('chapter_time_upload')
            ->take($x_top)
            ->get();
        return $ddb;


    }
}
