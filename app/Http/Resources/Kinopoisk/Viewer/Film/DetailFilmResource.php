<?php

namespace App\Http\Resources\Kinopoisk\Viewer\Film;

use App\Http\Repositories\Kinopoisk\Viewer\Review\ReviewRepository;
use App\Http\Resources\Kinopoisk\Viewer\Review\ListReviewResource;
use App\Http\Statistic\EvaluationStatistic;
use App\Http\Statistic\ReviewStatistic;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailFilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  App\Http\Resources\Kinopoisk\Viewer\Film
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $reviewRepository = new ReviewRepository();

        $userFilmCollection = collect(['film_id' => $this->id, 'is_critic' => false]);
        $criticFilmCollection = collect(['film_id' => $this->id, 'is_critic' => true]);

        $evaluationStatistic = new EvaluationStatistic($this->id, null);
        $evaluationCriticStatistic = new EvaluationStatistic($this->id, true);

        $reviewCriticStatistic = new ReviewStatistic($this->id, true);
        $reviewUserStatistic = new ReviewStatistic($this->id, false);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'country' => $this->country->name,
            'worldPremier' => $this->world_premiere,
            'budget' => $this->budget,
            'feesInWorld' => $this->fees_in_world,
            'overview' => $this->overview,
            'rating' => $evaluationStatistic->getRating(),
            'numberOfScore' => $evaluationStatistic->countScores(),
            'список похожих фильмов в разработке',
            'процентный рейтинг кинокритиков в разработке',
            'входит в топ 250 в разработке',
            'факты о фильме в разработке',
            'материалы (статьи) о фильме в разработке',
            'reviews' => [
                'reviewsOfCritics' => [
                    'numberOfReviews' => $reviewCriticStatistic->countNumOfReviews(),
                    'numOfPositiveReviews' => $reviewCriticStatistic->countNumOfReviewsInMood(1),
                    'numOfNegativeReviews' => $reviewCriticStatistic->countNumOfReviewsInMood(2),
                    'positiveReviewPercent' => $reviewCriticStatistic->countNumOfReviewInPercent(1),
                    'rating' => $evaluationCriticStatistic->getRating(),
                    'reviewList' => ListReviewResource::collection($reviewRepository->getReviewBuilder($criticFilmCollection)->limit(10)->get())
                ],
                'reviewsOfSpectators' => [
                    'numberOfAllReviews' => $reviewUserStatistic->countNumOfReviews(),
                    'positiveReview' => [
                        'quantity' => $reviewUserStatistic->countNumOfReviewsInMood(1),
                        'percent' => $reviewUserStatistic->countNumOfReviewInPercent(1)
                    ],
                    'negativeReview' => [
                        'quantity' => $reviewUserStatistic->countNumOfReviewsInMood(2),
                        'percent' => $reviewUserStatistic->countNumOfReviewInPercent(2)
                    ],
                    'neutralReview' => [
                        'quantity' => $reviewUserStatistic->countNumOfReviewsInMood(3),
                        'percent' => $reviewUserStatistic->countNumOfReviewInPercent(3)
                    ],
                    'reviewsList' => [
                        ListReviewResource::collection($reviewRepository->getReviewBuilder($userFilmCollection)->limit(10)->get())
                      ],
                ]
            ]
        ];
    }
}
