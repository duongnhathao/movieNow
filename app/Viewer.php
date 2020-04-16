<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Viewer extends Model
{
    protected $table = 'viewer';

    public static function get_viewer_by_id($rev_id){
        $reviewer  = DB::table('viewer')->where('rev_id','=',$rev_id)->get();
        if (isNull($reviewer)){
            return null;
        }else
            return $reviewer;
    }
}
