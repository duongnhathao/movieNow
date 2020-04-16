<?php

namespace App\Http\Controllers;

use App\Movie;
use App\MovieRating;
use App\User;
use App\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MovieRatingController extends Controller
{
    public static function update_start_movie(Request $request){
        $mov_id = $request ->input('mov_id');
        $rev_id = $request ->input('rev_id');
        $rev_starts = $request ->input('rev_starts');
       if (!is_null(Movie::get_movie_by_id($mov_id))&&!is_null(Viewer::get_viewer_by_id($rev_id))){
           $after_add_rev_starts = MovieRating::check_rating($rev_starts)+Movie::get_movie_by_id($mov_id)->nums_start;
           Movie::update_nums_start($after_add_rev_starts,$mov_id);
       }
    }



}
