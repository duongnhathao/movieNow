<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(GenresSeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(CastSeeder::class);
        $this->call(DirectorSeeder::class);
        $this->call(DirectionSeeder::class);
        $this->call(MovieViewerSeeder::class);
        $this->call(MovieRatingSeeder::class);
        $this->call(MovieGenresSeeder::class);
        $this->call(MovieChapterTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AdminSeeder::class);






    }
}
