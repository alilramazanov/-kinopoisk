<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Film::class;

    public function definition()
    {
        $name = $this->faker->name();
        $description = $this->faker->sentence(rand(20,30));
        $overview = $this->faker->sentence(rand(50,100));
        $country = rand(1,3);

        $date = $this->faker->dateTimeBetween('-40 years', '+ 5 years' );
        $worldPremiere = $date->format('Y-m-d');

        $feesInWorld = rand(1000000,40000000);
        $budget = rand(1000000, 2000000000);

        return [
            'name' => $name,
            'description' => $description,
            'overview' => $overview,
            'country_id' => $country,
            'world_premiere' => $worldPremiere,
            'fees_in_world' => $feesInWorld,
            'budget' => $budget

        ];
    }
}
