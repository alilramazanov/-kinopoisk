<?php

namespace App\Http\Filters\Kinopoisk\Viewer;

use App\Http\Filters\QueryFilter;

class ReviewQueryFilter extends QueryFilter
{
    public function __construct($request, $builder)
    {
        parent::__construct($request, $builder);
    }


    public function reviewMoodId($value){
        $this->builder
            ->where('review_mood_id', '=', $value);

    }

}
