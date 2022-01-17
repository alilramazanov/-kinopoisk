<?php

namespace App\Http\Filters\Kinopoisk\Viewer;

use App\Http\Filters\QueryFilter;

class FilmQueryFilter extends QueryFilter
{

    public function __construct($request, $builder){
        parent::__construct($request, $builder);
    }

    public function country($value){
        $this->builder
            ->where('fl.country_id', $value);
    }

    public function name($value){
        $this->builder
            ->where('fl.name', 'ilike', "%$value%");
    }

    public function genre($value){
        $this->builder
            ->leftJoin('films_by_genre as fbg','fbg.film_id', '=', 'fl.id')
            ->where('fbg.genre_id', $value);
    }

    public function date($value){
        $this->builder
            ->whereBetween('fl.world_premiere',[$value["first_date"], $value["second_date"]]);
    }

    public function categoryList($value){
        $this->builder
            ->leftJoin('film_listings as film_l', 'film_l.film_id', '=','fl.id' )
            ->where('film_l.list_category_id', $value);
    }
}
