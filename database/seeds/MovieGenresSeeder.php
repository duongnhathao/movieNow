<?php

use Illuminate\Database\Seeder;

class MovieGenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_genres')->insert([
            ['mov_id'=>1,'gen_id'=>10],
            ['mov_id'=>1,'gen_id'=>8],
            ['mov_id'=>2,'gen_id'=>5],
            ['mov_id'=>2,'gen_id'=>8],
            ['mov_id'=>3,'gen_id'=>5],
            ['mov_id'=>3,'gen_id'=>8],
            ['mov_id'=>4,'gen_id'=>7],
            ['mov_id'=>4,'gen_id'=>1],
            ['mov_id'=>5,'gen_id'=>7],
            ['mov_id'=>5,'gen_id'=>5],
            ['mov_id'=>6,'gen_id'=>10],
            ['mov_id'=>6,'gen_id'=>9],
            ['mov_id'=>6,'gen_id'=>11],





        ]);
    }
}
