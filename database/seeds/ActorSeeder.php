<?php

use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_actor')->insert([
            ['act_id'=>1,'act_fname'=>'Hugh','act_lname'=>'Jackman','act_gender'=>'M'],
            ['act_id'=>2,'act_fname'=>'Halle','act_lname'=>'Maria Berry','act_gender'=>'F'],
            ['act_id'=>3,'act_fname'=>'Tobey','act_lname'=>'Vincent Maguire','act_gender'=>'M'],
            ['act_id'=>4,'act_fname'=>'Kirsten','act_lname'=>'Dunst','act_gender'=>'M'],
            ['act_id'=>5,'act_fname'=>'James','act_lname'=>'Franco','act_gender'=>'F'],
            ['act_id'=>6,'act_fname'=>'Tom','act_lname'=>'Cruise','act_gender'=>'M'],
            ['act_id'=>7,'act_fname'=>'Kenneth','act_lname'=>'Branagh','act_gender'=>'M'],
            ['act_id'=>8,'act_fname'=>'Russell','act_lname'=>'Crowe','act_gender'=>'M'],
            ['act_id'=>9,'act_fname'=>'Connie','act_lname'=>'Nielsen','act_gender'=>'F'],
            ['act_id'=>10,'act_fname'=>'Ray','act_lname'=>'Romano','act_gender'=>'M'],
            ['act_id'=>11,'act_fname'=>'John','act_lname'=>'Leguizamo','act_gender'=>'M'],
            ['act_id'=>12,'act_fname'=>'Dylan','act_lname'=>'OBrien','act_gender'=>'M'],
            ['act_id'=>13,'act_fname'=>'Darius','act_lname'=>'McCrary','act_gender'=>'M'],


        ]);
    }
}
