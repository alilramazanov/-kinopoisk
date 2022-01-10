<?php

namespace Database\Factories;

use App\Models\FilmByGenre;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmByGenreFactory extends Factory
{

    protected $model = FilmByGenre::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'film_id' => rand(1,10),
            'genre_id' => rand(1,13)
        ];
    }
}
