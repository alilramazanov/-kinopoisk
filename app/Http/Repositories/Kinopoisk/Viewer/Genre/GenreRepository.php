<?php

namespace App\Http\Repositories\Kinopoisk\Viewer\Genre;

use App\Http\Repositories\Kinopoisk\Viewer\CoreRepository;
use App\Models\Genre as Model;
class GenreRepository extends CoreRepository
{

    protected function getModelClass()
    {
        // TODO: Implement getModelClass() method.

        return Model::class;
    }

    public function getListGenres(){
        $genres = $this->startConditions()
            ->all();

        return $genres;
    }
}
