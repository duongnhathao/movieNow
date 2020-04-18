<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewerController extends Controller
{
    public static function getNameViewer($id){
        try {
            $viewer = DB::table('viewer')->where('rev_id','=',$id)->get()->first();
            return $viewer->rev_name;
        } catch (\Throwable $e) {
            return 'Unknown';
        }
    }
}
