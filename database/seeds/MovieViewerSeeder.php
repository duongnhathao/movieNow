<?php

use Illuminate\Database\Seeder;

class MovieViewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('viewer')->insert([
            ['rev_id'=>1,'rev_email'=>'user1@gmail.com','rev_name'=>'Righty Sock','rev_password'=>'123123'],
            ['rev_id'=>2,'rev_email'=>'user2@gmail.com','rev_name'=>'Jack Malvern','rev_password'=>'123123'],
            ['rev_id'=>3,'rev_email'=>'user3@gmail.com','rev_name'=>'Flagrant Baronessa','rev_password'=>'123123'],
            ['rev_id'=>4,'rev_email'=>'user4@gmail.com','rev_name'=>'Alec Shaw','rev_password'=>'123123'],
        ]);
    }
}
