<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

class MovieDirector extends Model
{
    protected $table  = 'movie_direction';
    //protected $primaryKey = 'dir_id';

    public static function get_database_director(){
        $ddb =  DB::table('movie_direction')
            ->join('director','director.dir_id','=','movie_direction.dir_id');

//        dd($ddb);
        return $ddb;

    }

    public static function get_all_director_by_movie_id($mov_id)
    {
        $ddb = self::get_database_director();
        $direction = $ddb->where('mov_id','=',$mov_id)->get();
        return $direction;
    }



    public static function get_all_director()
    {
        return DB::table('director')->distinct()->get();
    }

    public static function get_all_director_by_name($dir_fname, $dir_lname)
    {
        $ddb = self::get_database_director();
        $direction = $ddb->where([
            [
                'dir_fname',$dir_fname
            ],[
                'dir_lname',$dir_lname
            ]
        ])->get();

        return $direction;
    }
    public static function get_all_director_by_fname_and_lname($dir_fname, $dir_lname)
    {

        $direction = DB::table('director')->where([
            [
                'dir_fname',$dir_fname
            ],[
                'dir_lname',$dir_lname
            ]
        ])->get();

        return $direction;
    }
}
