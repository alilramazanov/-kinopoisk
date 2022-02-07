<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleHeading;
use App\Models\Evaluation;
use App\Models\Favorite;
use App\Models\Film;
use App\Models\FilmByGenre;
use App\Models\FilmListing;
use App\Models\Review;
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
         $this->call(ReviewMoodSeeder::class);
         $this->call(HeadingSeeder::class);


         Film::factory(100)->create();
         FilmByGenre::factory(100)->create();
         FilmListing::factory(100)->create();
         Favorite::factory(100)->create();
         Evaluation::factory(10)->create();
         Review::factory(10)->create();
         Article::factory(100)->create();
         ArticleHeading::factory(200)->create();
    }
}
