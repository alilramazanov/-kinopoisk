<?php

namespace App\Http\Repositories\Kinopoisk\Viewer\Film;

use App\Http\Repositories\Kinopoisk\Viewer\CoreRepository;
use App\Models\Film as Model;

class FilmRepository extends CoreRepository
{


    protected function getModelClass()
    {
        // TODO: Implement getModelClass() method.
        return Model::class;
    }

    public function getDetailFilm($request){

        $filmId = $request->id;

        $films = $this->startConditions()
            ->where('id', $filmId)
            ->first();

        return $films;

    }

    public function getListFilmBuilder(){

        $columns = [
            'films.id',
            'films.name',
            'films.country_id',
            'films.world_premiere',
            ];

        $filmsBuilder = $this->startConditions()->query()->select($columns);

        return $filmsBuilder;
    }
}
