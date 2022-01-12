<?php

namespace App\Http\Controllers\Kinopoisk\Viewer;

use App\Http\Controllers\Controller;
use App\Http\Filters\Kinopoisk\Viewer\FilmQueryFilter;
use App\Http\Repositories\Kinopoisk\Viewer\Film\FilmRepository;
use App\Http\Requests\Kinopoisk\Viewer\Film\AddEvaluationRequest;
use App\Http\Requests\Kinopoisk\Viewer\Film\AddInFavoritesRequest;
use App\Http\Requests\Kinopoisk\Viewer\Film\DetailFilmRequest;
use App\Http\Resources\Kinopoisk\Viewer\Film\DetailFilmResource;
use App\Http\Resources\Kinopoisk\Viewer\Film\ListFilmsResource;
use App\Models\Evaluation;
use App\Models\Favorite;
use App\Models\Film;
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

        $filteredFilmBuilder = new FilmQueryFilter($request, $this->filmRepository->getListFilmBuilder());

        return ListFilmsResource::collection($filteredFilmBuilder->apply()->get());

    }

    public function addInFavorites(AddInFavoritesRequest $request){

        $isInFavoriteExists = Favorite::query()
            ->where('user_id', $request->user_id)
            ->where('film_id', $request->film_id)
            ->exists();

        if ($isInFavoriteExists){
            $isDelete = Favorite::query()
                ->where('film_id', $request->film_id)
                ->where('user_id', $request->user_id)
                ->delete();

            return 1;
        }

        $isAddInFavorites = Favorite::create($request->input());

        if ($isAddInFavorites){
            return 1;
        }
        return 0;
    }

    public function listFavorites(Request $request){

        $filmBuilder = $this->filmRepository->listFavoritesBuilder($request);

        return ListFilmsResource::collection($filmBuilder->get());
    }

    public function addEvaluation(AddEvaluationRequest $request){

        $isCreate = Evaluation::query()
            ->updateOrCreate(
                ['film_id' => $request->film_id, 'user_id' => $request->user_id],
                ['score' => $request->score]
            );

        if ($isCreate) {
            return 1;
        }

        return 0;
    }
}
