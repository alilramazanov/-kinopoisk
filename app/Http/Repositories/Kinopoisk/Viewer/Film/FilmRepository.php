<?php

namespace App\Http\Repositories\Kinopoisk\Viewer\Film;

use App\Http\Repositories\Kinopoisk\Viewer\CoreRepository;
use App\Http\Resources\Kinopoisk\Viewer\Film\ListFilmsResource;
use App\Models\Film as Model;
use Illuminate\Http\Request;

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
            'fl.id',
            'fl.name',
            'fl.country_id',
            'fl.world_premiere',
            ];

        $filmsBuilder = $this->startConditions()->query()->select($columns);

        return $filmsBuilder;
    }

    public function listFavoritesBuilder($request){

        $films = $this->getListFilmBuilder()
            ->leftJoin('favorites as f', 'f.film_id', '=','fl.id')
            ->where('f.user_id', $request->user_id);

        return $films;
    }
}
