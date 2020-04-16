<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class MovieRating extends Model
{
    protected $table = 'movie_rating';
    public static function check_rating($rev_start){
        if ($rev_start > 5 || $rev_start<0){
            return 1;
        }
        else{
            return $rev_start;
        }
    }
}
