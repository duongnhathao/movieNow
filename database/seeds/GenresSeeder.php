<?php

use Illuminate\Database\Seeder;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['gen_id'=>1,'gen_title'=>'Thriller'],
            ['gen_id'=>2,'gen_title'=>'Romance'],
            ['gen_id'=>3,'gen_title'=>'Mystery'],
            ['gen_id'=>4,'gen_title'=>'Novel'],
            ['gen_id'=>5,'gen_title'=>'Action'],
            ['gen_id'=>6,'gen_title'=>'Film series'],
            ['gen_id'=>7,'gen_title'=>'Drama'],
            ['gen_id'=>8,'gen_title'=>'Sci-fi'],
            ['gen_id'=>9,'gen_title'=>'Adventure'],
            ['gen_id'=>10,'gen_title'=>'Fantasy'],
            ['gen_id'=>11,'gen_title'=>'Cartoon'],


        ]);
    }
}
