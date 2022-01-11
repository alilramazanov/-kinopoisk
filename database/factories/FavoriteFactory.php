<?php

namespace Database\Factories;

use App\Models\Favorite;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Favorite::class;
    public function definition()
    {
        return [
            'user_id' => 1,
            'film_id' => rand(1, 100)
        ];
    }
}
