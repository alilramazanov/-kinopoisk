<?php

namespace App\Http\Scribe\Kinopoisk\VIewer\Review;

use App\Http\Scribe\Scribe;
use App\Models\Review as Model;

class ReviewScribe extends Scribe
{

    protected function getModelClass()
    {
        // TODO: Implement getModelClass() method.
        return Model::class;
    }

    public function create($request){

        $newReview = $this->startCondition()
            ->query()
            ->create($request->input());

        return $newReview;
    }

    public function delete($request){

        $isDelete = $this->startCondition()
            ->where('id', $request->id)
            ->delete();

        return $isDelete;
    }

    public function update($request){

        $isUpdate = $this->startCondition()
            ->query()
            ->where('id', $request->id)
            ->update($request->input());

        return $isUpdate;

    }
}
