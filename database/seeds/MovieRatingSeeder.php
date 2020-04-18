<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MovieRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_rating')->insert([
            ['mov_id'=>1,'rev_id'=>1,'rev_starts'=>2.5,'rev_date'=>'2020-3-2'],
            ['mov_id'=>1,'rev_id'=>2,'rev_starts'=>5,'rev_date'=>'2020-4-2'],
            ['mov_id'=>2,'rev_id'=>2,'rev_starts'=>3.5,'rev_date'=>'2020-3-2'],
            ['mov_id'=>2,'rev_id'=>2,'rev_starts'=>4,'rev_date'=>'2020-4-2'],
            ['mov_id'=>3,'rev_id'=>3,'rev_starts'=>4.5,'rev_date'=>'2020-3-2'],
            ['mov_id'=>3,'rev_id'=>3,'rev_starts'=>2,'rev_date'=>'2020-4-2'],
            ['mov_id'=>4,'rev_id'=>4,'rev_starts'=>2.5,'rev_date'=>'2020-3-2'],
            ['mov_id'=>4,'rev_id'=>4,'rev_starts'=>5,'rev_date'=>'2020-3-2'],
            ['mov_id'=>5,'rev_id'=>1,'rev_starts'=>4.0,'rev_date'=>'2020-3-2'],
            ['mov_id'=>6,'rev_id'=>4,'rev_starts'=>1.5,'rev_date'=>'2020-3-2'],
            ['mov_id'=>3,'rev_id'=>1,'rev_starts'=>2,'rev_date'=>'2020-4-2'],


        ]);
    }
}
