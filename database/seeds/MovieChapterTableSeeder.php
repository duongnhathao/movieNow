<?php

use Illuminate\Database\Seeder;

class MovieChapterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_chapter')->insert([
            ['mov_id'=>1,'chapter_nums'=>1,'chapter_name'=>'CHAPTER 1','chapter_link'=>'movies/x-men the last stand/chapter_1.mp4'],
            ['mov_id'=>1,'chapter_nums'=>2,'chapter_name'=>'CHAPTER 2','chapter_link'=>'movies/x-men the last stand/chapter_2.mp4'],
            ['mov_id'=>2,'chapter_nums'=>1,'chapter_name'=>'CHAPTER 1 Spider man 2','chapter_link'=>'movies/spider man 2/chapter_1.mp4'],
            ['mov_id'=>2,'chapter_nums'=>2,'chapter_name'=>'CHAPTER 2 Spider man 2','chapter_link'=>'movies/spider man 2/chapter_2.mp4'],
            ['mov_id'=>3,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 Spider man 3','chapter_link'=>'movies/spider man 3/chapter_1.mp4'],

        ]);
    }
}
