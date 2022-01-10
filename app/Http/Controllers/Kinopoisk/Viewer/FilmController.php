<?php

namespace App\Http\Controllers\Kinopoisk\Viewer;

use App\Http\Controllers\Controller;
use App\Http\Filters\Kinopoisk\Viewer\FilmQueryFilter;
use App\Http\Repositories\Kinopoisk\Viewer\Film\FilmRepository;
use App\Http\Requests\Kinopoisk\Viewer\Film\DetailFilmRequest;
use App\Http\Resources\Kinopoisk\Viewer\Film\DetailFilmResource;
use App\Http\Resources\Kinopoisk\Viewer\Film\ListFilmsResource;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    protected $filmRepository;

    public function __construct(){

        $this->filmRepository = app(FilmRepository::class);

    }

    public function detailFilm(DetailFilmRequest $request){

        $films = $this->filmRepository->getDetailFilm($request);

        return new DetailFilmResource($films);
    }

    public function listFilm(Request $request){

        $filteredFilms = new FilmQueryFilter($request, $this->filmRepository->getListFilmBuilder());

        return ListFilmsResource::collection($filteredFilms->apply()->get());

    }
}
