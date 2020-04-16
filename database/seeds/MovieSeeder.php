<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie')->insert([
            ['mov_id'=>1,'mov_title'=>'X-Men: The Last Stand','mov_year'=>2006,'mov_time'=>104,'mov_lang'=>'English','mov_rel'=>'2006/5/26','mov_rel_country'=>'US','mov_img'=>'images/movie1.jpg','mov_description'=>'The discovery of a cure for mutations leads to a turning point for Mutants (Hugh Jackman, Halle Berry, Famke Janssen, Anna Paquin, Rebecca Romijn, Kelsey Grammer).
            They may now choose to give up their powers and become fully human or retain their uniqueness and remain isolated. War looms between the followers of Charles Xavier (Patrick Stewart), who preaches tolerance, and those of Magneto (Ian McKellen), who advocates survival of the fittest.'],
            ['mov_id'=>2,'mov_title'=>'Spider Man 2','mov_year'=>2004,'mov_time'=>135,'mov_lang'=>'English','mov_rel'=>'2004/6/30','mov_rel_country'=>'US','mov_img'=>'images/movie2.jpg','mov_description'=>'Peter Parker is dissatisfied with life when he loses his job, the love of his life, Mary Jane, and his powers. Amid all the chaos, he must fight Doctor Octopus who threatens to destroy New York City.'],
            ['mov_id'=>3,'mov_title'=>'Spider Man 3','mov_year'=>2007,'mov_time'=>139,'mov_lang'=>'English','mov_rel'=>'2007/5/4','mov_rel_country'=>'US','mov_img'=>'images/movie3.jpg','mov_description'=>'Peter Parker becomes one with a symbiotic alien that bolsters his Spider-Man avatar and affects his psyche. He also has to deal with Sandman and maintain a fragmented relationship with Mary Jane.'],
            ['mov_id'=>4,'mov_title'=>'Valkyrie','mov_year'=>2008,'mov_time'=>124,'mov_lang'=>'English,German','mov_rel'=>'2008/12/25','mov_rel_country'=>'US','mov_img'=>'images/movie4.jpg','mov_description'=>'During World War II, a team of Nazi officers comes up with a plan to assassinate Hitler and destroy the Nazi rule by using Operation Valkyrie as a means to do so.'],
            ['mov_id'=>5,'mov_title'=>'Gladiator','mov_year'=>2000,'mov_time'=>155,'mov_lang'=>'English,German','mov_rel'=>'2008/5/12','mov_rel_country'=>'UK','mov_img'=>'images/movie5.jpg','mov_description'=>''],
            ['mov_id'=>6,'mov_title'=>'Ice age','mov_year'=>2002,'mov_time'=>81 ,'mov_lang'=>'English','mov_rel'=>'2008/3/12','mov_rel_country'=>'UK','mov_img'=>'images/movie6.jpg','mov_description'=>''],
            ['mov_id'=>7,'mov_title'=>'Transformers','mov_year'=>2007,'mov_time'=>143,'mov_lang'=>'English','mov_rel'=>'2007/6/12','mov_rel_country'=>'US','mov_img'=>'images/movie7.jpg','mov_description'=>''],
            ['mov_id'=>8,'mov_title'=>'Kung Fu Panda','mov_year'=>2008,'mov_time'=>92,'mov_lang'=>'English','mov_rel'=>'2008/6/26','mov_rel_country'=>'US','mov_img'=>'images/movie9.jpg','mov_description'=>''],
            ['mov_id'=>9,'mov_title'=>'Eagle Eye','mov_year'=>2008,'mov_time'=>118,'mov_lang'=>'English','mov_rel'=>'2008/12/26','mov_rel_country'=>'US','mov_img'=>'images/movie10.jpg','mov_description'=>''],
            ['mov_id'=>10,'mov_title'=>'Narnia','mov_year'=>2005,'mov_time'=>118,'mov_lang'=>'English','mov_rel'=>'2005/12/09','mov_rel_country'=>'US','mov_img'=>'images/movie11.jpg','mov_description'=>'']
        ]);
    }
}
