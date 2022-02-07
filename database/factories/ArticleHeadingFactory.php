<?php

namespace Database\Factories;

use App\Models\ArticleHeading;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleHeadingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = ArticleHeading::class;
    public function definition()
    {

        $articleId = rand(1,100);
        $headingId = rand(1,9);
        return [
            'article_id' => $articleId,
            'heading_id' => $headingId
        ];
    }
}
