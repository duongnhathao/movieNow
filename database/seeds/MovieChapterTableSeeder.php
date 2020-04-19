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
            ['mov_id'=>12,'chapter_nums'=>1,'chapter_name'=>'CHAPTER 1 Spider man 2','chapter_link'=>'movies/spider man 2/chapter_1.mp4'],
            ['mov_id'=>12,'chapter_nums'=>2,'chapter_name'=>'CHAPTER 2 Spider man 2','chapter_link'=>'movies/spider man 2/chapter_2.mp4'],
            ['mov_id'=>13,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 Spider man 3','chapter_link'=>'movies/spider man 3/chapter_1.mp4'],
            ['mov_id'=>13,'chapter_nums'=>1,'chapter_name'=>'Chapter 2 Spider man 3','chapter_link'=>'movies/spider man 3/chapter_2.mp4'],
            ['mov_id'=>4,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 Valkyrie','chapter_link'=>'movies/Valkyrie/Valkyrie1.mp4'],
            ['mov_id'=>5,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 Gladiator','chapter_link'=>'movies/Gladiator/Gladiator1.mp4'],
            ['mov_id'=>6,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 Ice Age','chapter_link'=>'movies/Ice Age/Ice Age1.mp4'],
            ['mov_id'=>7,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 Transformers','chapter_link'=>'movies/Transformers/Transformers1.mp4'],
            ['mov_id'=>8,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 Kung Fu Panda','chapter_link'=>'movies/Kung Fu Panda/Kung Fu Panda1.mp4'],
            ['mov_id'=>9,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 Eagle Eye','chapter_link'=>'movies/Eagle Eye/Eagle Eye1.mp4'],
            ['mov_id'=>10,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 Narnia','chapter_link'=>'movies/Narnia/Narnia1.mp4'],
            ['mov_id'=>11,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 The Dead Don\'t Die ','chapter_link'=>'movies/The Dead Don\'t Die/The Dead Don\'t Die1.mp4'],
            ['mov_id'=>2,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 Your Name ','chapter_link'=>'movies/Your Name/Your Name1.mp4'],
            ['mov_id'=>3,'chapter_nums'=>1,'chapter_name'=>'Chapter 1 Weathering With You','chapter_link'=>'movies/Weathering With You/Weathering With You1.mp4'],

        ]);
    }
}
