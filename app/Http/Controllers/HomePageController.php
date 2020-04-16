<?php

namespace App\Http\Controllers;

use App\Movie;
use App\MovieChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function index()
    {
        try {
            try {
                $user = Auth::user();

            }
            catch (\Exception $exception){
                $user  = null;

            }
            $top_10_movie = $this->getTopXLastestMovie(10);
//            dd($top_10_movie);
            $mov = Movie::get_all_movie();
                return \view('movie_v2.index', compact('mov', 'top_10_movie','user'));


        } catch (\Exception $e) {
//            return view('error_page.404page');
            echo $e;
        }

//        dd(session()->all());

//        dd($mov);

    }

    public function about()
    {
        return view('movie_v2.about');
    }

    public function getTopXLastestMovie($x_top)
    {
        $id_top_X_lastest_movie = MovieController::get_top_x_movie_just_update($x_top);
        $top_X_movie = collect();
        foreach ($id_top_X_lastest_movie as $id_movietop) {
            $top_X_movie->push(Movie::get_movie_by_id($id_movietop->mov_id));
        }
        return $top_X_movie;
    }

}
