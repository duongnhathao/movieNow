<?php

use Illuminate\Database\Seeder;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('director')->insert([
            ['dir_id'=>1,'dir_fname'=>'Brett','dir_lname'=>'Ratner'],
            ['dir_id'=>2,'dir_fname'=>'Sam','dir_lname'=>'Raimi'],
            ['dir_id'=>3,'dir_fname'=>'Bryan','dir_lname'=>'Singer'],
            ['dir_id'=>4,'dir_fname'=>'Ridley','dir_lname'=>'Scott'],
            ['dir_id'=>5,'dir_fname'=>'Chris','dir_lname'=>'Wedge'],
//            ['dir_id'=>6,'dir_fname'=>'','dir_lname'=>''],
//            ['dir_id'=>7,'dir_fname'=>'','dir_lname'=>''],

        ]);
    }
}
