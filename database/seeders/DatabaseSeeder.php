<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\FilmByGenre;
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
         \App\Models\User::factory(10)->create();

         $this->call(CountrySeeder::class);
         $this->call(GenreSeeder::class);

         Film::factory(10)->create();
         FilmByGenre::factory(20)->create();
    }
}
