<?php

namespace App\Http\Repositories\Kinopoisk\Viewer\Review;


use App\Http\Repositories\Kinopoisk\Viewer\CoreRepository;
use App\Models\Review as Model;

class ReviewRepository extends CoreRepository
{

    public function getModelClass()
    {
        // TODO: Implement getModelClass() method.
        return Model::class;
    }

    public function getReviewBuilder($request){

        if ($request->get('is_critic') === null){
            $reviewBuilder = $this->startConditions()->query()
                ->where('film_id','=', $request->get('film_id'));

            return $reviewBuilder;

        } else {
            $reviewBuilder = $this->startConditions()->query()
                ->where('film_id','=', $request->get('film_id'))
                ->where('is_critic', '=', $request->get('is_critic'));

            return $reviewBuilder;
        }
    }
}
