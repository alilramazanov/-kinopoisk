<?php

namespace Database\Seeders;

use App\Models\Favorite;
use App\Models\Film;
use App\Models\FilmByGenre;
use App\Models\FilmListing;
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
         $this->call(ListCategorySeeder::class);


         Film::factory(100)->create();
         FilmByGenre::factory(100)->create();
         FilmListing::factory(100)->create();
         Favorite::factory(100)->create();
    }
}
