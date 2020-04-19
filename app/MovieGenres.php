<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

class MovieGenres extends Model
{
    protected $table  = 'movie_genres';
    //protected $primaryKey = 'dir_id';

    public static function get_database_genres(){
        $ddb =  DB::table('movie_genres')
            ->join('genres','genres.gen_id','=','movie_genres.gen_id');

//        dd($ddb);
        return $ddb;

    }
    public static function get_all_genres(){
        return DB::table('genres')->distinct()->get();
    }
    public static function get_genres_by_mov_id($mov_id){
        return DB::table('movie_genres')->where('mov_id',$mov_id)->get();
    }
    public static function get_genres_by_name($gen_title){
        return DB::table('genres')->where('gen_title',$gen_title)->get();
    }
    public static function get_all_genres_by_movie_id($mov_id)
    {
        $ddb = self::get_database_genres();
        $genres = $ddb->where('mov_id','=',$mov_id)->get();
        return $genres;
    }
}
