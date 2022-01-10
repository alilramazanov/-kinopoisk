<?php

namespace App\Http\Controllers\Kinopoisk\Viewer;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Kinopoisk\Viewer\Genre\GenreRepository;
use App\Http\Resources\Kinopoisk\Viewer\Genre\ListGenresResource;

class GenreController extends Controller
{


    protected $genreRepository;

    public function __construct(){
        $this->genreRepository = app(GenreRepository::class);
    }


    public function listGenres(){

        $genres = $this->genreRepository->getListGenres();

        return ListGenresResource::collection($genres);
    }
}
