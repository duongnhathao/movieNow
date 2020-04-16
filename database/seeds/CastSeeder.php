<?php

use Illuminate\Database\Seeder;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_cast')->insert([
            ['act_id'=>1,'mov_id'=>1,'role'=>'Logan / Wolverine'],
            ['act_id'=>2,'mov_id'=>1,'role'=>'Ororo Munroe / Storm'],
            ['act_id'=>3,'mov_id'=>2,'role'=>'Peter Parker'],
            ['act_id'=>4,'mov_id'=>2,'role'=>'Mary Jane Watson'],
            ['act_id'=>3,'mov_id'=>3,'role'=>'Peter Parker'],
            ['act_id'=>4,'mov_id'=>3,'role'=>'Mary Jane Watson'],
            ['act_id'=>5,'mov_id'=>3,'role'=>'Harry Osborn'],
            ['act_id'=>6,'mov_id'=>4,'role'=>'Colonel Claus Schenk Graf von Stauffenberg'],
            ['act_id'=>7,'mov_id'=>4,'role'=>'Major General Henning von Tresckow'],
            ['act_id'=>8,'mov_id'=>5,'role'=>'Maximus Decimus Meridius'],
            ['act_id'=>9,'mov_id'=>5,'role'=>'Lucilla'],
            ['act_id'=>10,'mov_id'=>6,'role'=>'Manny'],
            ['act_id'=>11,'mov_id'=>6,'role'=>'Sid'],
            ['act_id'=>12,'mov_id'=>7,'role'=>'Bumblebee'],
            ['act_id'=>13,'mov_id'=>7,'role'=>'Jazz'],
//            ['act_id'=>13,'mov_id'=>7,'role'=>'Ironhide'],
        ]);
    }
}
