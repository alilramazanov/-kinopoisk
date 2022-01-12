<?php

namespace App\Http\Statistic\Film;


use App\Models\Evaluation;

abstract class FilmStatisticCore
{

    public function getAllScores($film_id)
    {

        $columns = [
            'evaluations.score as score',
            'fl.id'
        ];

        $score = Evaluation::query()
            ->select($columns)
            ->leftJoin('films as fl', 'evaluations.film_id', '=', 'fl.id')
            ->where('fl.id', $film_id)
            ->count('evaluations.score');

        return $score;
    }

    public function getALlRating($film_id)
    {
        $columns = [
            'evaluations.score as score',
            'fl.id',
        ];

        $rating = Evaluation::query()
            ->select($columns)
            ->leftJoin('films as fl', 'evaluations.film_id', '=', 'fl.id')
            ->where('fl.id', $film_id)
            ->avg('evaluations.score');

        return round($rating, 1);
    }
}
