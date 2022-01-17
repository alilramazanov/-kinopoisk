<?php

namespace App\Http\Controllers\Kinopoisk\Viewer;

use App\Http\Controllers\Controller;
use App\Http\Filters\Kinopoisk\Viewer\ReviewQueryFilter;
use App\Http\Repositories\Kinopoisk\Viewer\Review\ReviewRepository;
use App\Http\Requests\Kinopoisk\Viewer\Review\CreateReviewRequest;
use App\Http\Requests\Kinopoisk\Viewer\Review\DeleteReviewRequest;
use App\Http\Requests\Kinopoisk\Viewer\Review\ListReviewRequest;
use App\Http\Requests\Kinopoisk\Viewer\Review\UpdateReviewRequest;
use App\Http\Resources\Kinopoisk\Viewer\Review\ListReviewResource;
use App\Http\Scribe\Kinopoisk\VIewer\Review\ReviewScribe;
use App\Http\Statistic\EvaluationStatistic;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


    protected $reviewScribe;
    protected $reviewRepository;


    public function __construct(){
        $this->reviewScribe = app(ReviewScribe::class);
        $this->reviewRepository = app(ReviewRepository::class);
    }

    public function test(ListReviewRequest $request){

        $evaluationStatistic = new EvaluationStatistic(1, false);
        $statistic = $evaluationStatistic->countScores();
        $rating = $evaluationStatistic->getRating();
        return $rating;

    }

    public function list(ListReviewRequest $request){

        $reviewBuilder = $this->reviewRepository->getReviewBuilder($request);
        $reviewQueryFilter = new ReviewQueryFilter($request, $reviewBuilder);

        return ListReviewResource::collection($reviewQueryFilter->apply()->paginate(10));

    }

    public function create(CreateReviewRequest $request){

        $newReview = $this->reviewScribe->create($request);

        if (!($newReview == null)){
            return 1;
        }
        return 0;

    }

    public function delete(DeleteReviewRequest $request){

        $isDelete = $this->reviewScribe->delete($request);
        if ($isDelete){
            return 1;
        }
        return 0;

    }

    public function update(UpdateReviewRequest $request){

        $isUpdate = $this->reviewScribe->update($request);

        if ($isUpdate){
            return 1;
        }
        return 0;
    }
}
