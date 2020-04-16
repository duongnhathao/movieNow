<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MovieCast extends Model
{
    protected $table = 'movie_cast';
    protected $primaryKey = ['act_id', 'mov_id'];

     public static function get_database_actor(){
        $ddb =  DB::table('movie_cast')
            ->join('movie_actor','movie_actor.act_id','=','movie_cast.act_id');

//        dd($ddb);
        return $ddb;

    }
    public static function get_database_director(){
        $ddb =  DB::table('movie_direction')
            ->join('director','director.dir_id','=','movie_direction.dir_id');

//        dd($ddb);
        return $ddb;

    }
    public static function get_all_cast_by_movie_id($mov_id)
    {
        $ddb = self::get_database_actor();
       $a = $ddb->where('mov_id','=',$mov_id)->get();
//       dd($a);
       return $a;
    }
    public static function get_all_cast_by_movie_title($mov_title)
    {
        $ddb = self::get_database_actor();
        $a = $ddb->where('mov_title','=',$mov_title)->get();
//       dd($a);
        return $a;
    }
    public static function get_all_dir_by_movie_id($mov_id)
    {
        $ddb = self::get_database_director();
        $a = $ddb->where('mov_id','=',$mov_id)->get();
//       dd($a);
        return $a;
    }
}
