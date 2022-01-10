<?php

namespace App\Http\Filters\Kinopoisk\Viewer;

use App\Http\Filters\QueryFilter;
use App\Models\Film;

class FilmQueryFilter extends QueryFilter
{

    public function __construct($request, $builder){
        parent::__construct($request, $builder);
    }

    public function country($value){
        $this->builder
            ->where('country_id', $value);
    }

    public function name($value){
        $this->builder
            ->where('name', 'ilike', "%$value%");
    }

    public function genre($value){
        $this->builder
            ->leftJoin('films_by_genre as fbg','fbg.film_id', '=', 'films.id')
            ->where('fbg.genre_id', $value);
    }

    public function date($value){
        $this->builder
            ->whereBetween('world_premiere',[$value["first_date"], $value["second_date"]]);
    }
}
