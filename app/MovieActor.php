<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieActor extends Model
{
    protected $table  = 'movie_actor';
    protected $primaryKey = 'act_id';

    public static function get_all_cast_by_fname_and_lname_and_gender($act_fname, $act_lname, $act_gender)
    {

        $direction = DB::table('movie_actor')->where([
            [
                'act_fname',$act_fname
            ],[
                'act_lname',$act_lname
            ],[
                'act_gender',$act_gender
            ]
        ])->get();

        return $direction;
    }


}
