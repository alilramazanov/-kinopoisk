<?php

namespace Database\Factories;

use App\Models\FilmListing;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = FilmListing::class;
    public function definition()
    {
        return [
            'film_id' => rand(1,100),
            'list_category_id' => rand(1, 10)
        ];
    }
}
