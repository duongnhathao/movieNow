<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MovieChapter extends Model
{
    protected $table = 'movie_chapter';

    public static function get_all_chapter_by_movie_id($mov_id)
    {
        $ddb =  DB::table('movie_chapter')
            ->where('mov_id',$mov_id)->orderby('chapter_nums')
            ->get();

        return $ddb;
    }

    public static function get_chapter_by_chapter_nums($chapter_id)
    {
        $ddb =  DB::table('movie_chapter')
            ->where('chapter_id',$chapter_id)
            ->first();
        return $ddb;
    }

    public static function get_chapter_by_chapter_nums_movie_id($chapter_nums,$mov_id)
    {
        $ddb =  DB::table('movie_chapter')
            ->where('mov_id',$mov_id)
            ->where('chapter_nums',$chapter_nums)
            ->first();

        return $ddb;
    }

    public static function delete_chapter_by_chapter_link($chapter_link){
        $ddb =  DB::table('movie_chapter')
            ->where('chapter_link',$chapter_link)
            ->delete();

    }

}
