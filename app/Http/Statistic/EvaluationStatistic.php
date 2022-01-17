<?php

namespace App\Http\Statistic;

use App\Models\Evaluation;
use App\Models\Film;

class EvaluationStatistic extends StatisticCore
{

    public function __construct($filmId, $isCritic)
    {
        parent::__construct($filmId, $isCritic);
    }


    public function countScores(){

        $columns = [
            'ev.score as score',
            'fl.id'
        ];

        if ($this->isCritic === null){
            $numOfScore = Film::query()
                ->select($columns)
                ->leftJoin('evaluations as ev','ev.film_id', '=', 'fl.id')
                ->where('fl.id', '=', $this->filmId)
                ->count('ev.score');

            return $numOfScore;

        }

        $numOfScore = Film::query()
            ->select($columns)
            ->leftJoin('evaluations as ev','ev.film_id', '=', 'fl.id')
            ->where('fl.id', '=', $this->filmId)
            ->where('ev.is_critic', '=',  $this->isCritic)
            ->count('ev.score');

        return $numOfScore;
    }


    public function getRating(){

        $columns = [
            'fl.id',
            'ev.score as score',
        ];

        $roundRating = 0;

        if ($this->isCritic === null){

            $rating = Film::query()
                ->leftJoin('evaluations as ev', 'ev.film_id', '=', 'fl.id')
                ->where('fl.id', '=', $this->filmId)
                ->avg('ev.score');

            $roundRating = round($rating,1);

        } else {

            $rating = Film::query()
                ->leftJoin('evaluations as ev', 'ev.film_id', '=', 'fl.id')
                ->where('fl.id', '=', $this->filmId)
                ->where('ev.is_critic', '=', $this->isCritic)
                ->avg('ev.score');

            $roundRating = round($rating,1);

        }

        return $roundRating;

    }
}
