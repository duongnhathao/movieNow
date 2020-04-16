<?php

use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_direction')->insert([
            ['dir_id'=>1,'mov_id'=>1],
            ['dir_id'=>2,'mov_id'=>2],
            ['dir_id'=>2,'mov_id'=>3],
            ['dir_id'=>3,'mov_id'=>4],
            ['dir_id'=>4,'mov_id'=>5],
//            ['dir_id'=>,'mov_id'=>],
//            ['dir_id'=>,'mov_id'=>],
//            ['dir_id'=>,'mov_id'=>],
//            ['dir_id'=>,'mov_id'=>],
//            ['dir_id'=>,'mov_id'=>],
//            ['dir_id'=>,'mov_id'=>],


        ]);
    }
}
