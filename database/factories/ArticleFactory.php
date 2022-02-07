<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Article::class;
    public function definition()
    {
        $title = $this->faker->text(rand(5,20));
        $text = $this->faker->sentence(rand(300, 2000));
        $userId = rand(1,3);


        return [
            'title' => $title,
            'text' => $text,
            'user_id' => $userId
        ];
    }
}
