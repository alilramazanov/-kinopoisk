<?php

namespace Database\Factories;

use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Evaluation::class;
    public function definition()
    {
        return [
            'user_id' => rand(1,10),
            'film_id' => rand(1, 3),
            'score' => rand(1, 10)
        ];
    }
}
