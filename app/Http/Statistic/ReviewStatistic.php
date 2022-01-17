<?php

namespace App\Http\Statistic;

use App\Models\Evaluation;
use App\Models\Film;
use App\Models\Review;

class ReviewStatistic extends StatisticCore
{
    public function __construct($filmId, $isCritic)
    {
        parent::__construct($filmId, $isCritic);
    }


    public function countNumOfReviews(){

        if ($this->isCritic === null){
            $numOfReviews = Review::query()
                ->where('film_id','=', $this->filmId)
                ->count();

            return $numOfReviews;

        } else {
            $numOfReviews = Review::query()
                ->where('film_id', '=', $this->filmId)
                ->where('is_critic', '=', $this->isCritic)
                ->count();


            return $numOfReviews;

        }
    }

    public function countNumOfReviewsInMood($reviewMoodId){
        $numOfReviews = Review::query()
            ->where('film_id', '=', $this->filmId)
            ->where('is_critic', '=', $this->isCritic)
            ->where('review_mood_id', '=', $reviewMoodId)
            ->count();

        return $numOfReviews;

    }

    public function countNumOfReviewInPercent($reviewMoodId){

        $numOfAllReviews = 0;

        if ($this->isCritic === null){
            $numOfPositiveReviews = Review::query()
                ->where('film_id', $this->filmId)
                ->where('is_critic', '=', $this->isCritic)
                ->where('review_mood_id', $reviewMoodId)
                ->count();

        } else {
            $numOfPositiveReviews = Review::query()
                ->where('film_id', $this->filmId)
                ->where('is_critic', '=', $this->isCritic)
                ->where('review_mood_id', $reviewMoodId)
                ->count();
        }


        $numOfAllReviews = $this->countNumOfReviews();

        $numOfPositiveReviewsInPercent = ($numOfAllReviews != 0 ? round(($numOfPositiveReviews / $numOfAllReviews) * 100, 0) : 0);

        return $numOfPositiveReviewsInPercent;
    }

}
