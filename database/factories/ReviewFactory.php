<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function PHPUnit\Framework\isTrue;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(rand(10,30));
        $text = $this->faker->text(rand(1000,10000));
        $user_id = rand(1,3);
        $film_id = rand(1,100);
        $review_mood_id = rand(1,3);
        $is_critic = (rand(0,1) ? true : false);

        return [
            'title' => $title,
            'text' => $text,
            'user_id' => $user_id,
            'film_id' => $film_id,
            'review_mood_id' => $review_mood_id,
            'is_critic' => $is_critic
        ];
    }
}
