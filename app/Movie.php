<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

class Movie extends Model
{
    protected $table = 'movie';
    protected $primaryKey = 'mov_id';
    public $timestamps = false;
    protected $dateFormat = 'Y-m-d';

    public static function get_movie_by_id($mov_id)
    {
        $mov = DB::table('movie')->where('mov_id', $mov_id)->get()->first();
        return $mov;

    }

    public static function get_movie_by_title($mov_title)
    {
        $mov = DB::table('movie')->where('mov_title', $mov_title)->get()->first();

        return $mov;

    }
    public static function get_all_movie()
    {
        $mov_all = DB::table('movie')->get();
//        dd($mov_all);

        return $mov_all;
    }


    public static function get_database_genres()
    {
        $ddb = DB::table('movie_genres')
            ->join('genres', 'genres.gen_id', '=', 'movie_genres.gen_id');

//        dd($ddb);
        return $ddb;

    }
    public static function get_all_genres_by_movie_id($mov_id)
    {
        $ddb = self::get_database_genres();
        $a = $ddb->where('mov_id','=',$mov_id)->get();
//       dd($a);
        return $a;
    }
   public static function get_all_genres(){
        $ddb = DB::table('genres')->get();
        return $ddb;
   }
   public static function update_nums_start($nums_start, $mov_id)
   {
       DB::table('movie')
           ->where('mov_id', $mov_id)
           ->update(['nums_start' => $nums_start]);
   }
}
