<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    ['prefix' => 'kinopoisk/v1'],
    function (){
        Route::group(
            ['prefix' => 'viewer'],
            function (){
                Route::group(
                    ['prefix' => 'films'],
                    function(){
                        Route::get('/detail-film', 'Kinopoisk\Viewer\FilmController@detailFilm');
                        Route::get('/list-film', 'Kinopoisk\Viewer\FilmController@listFilm');

                        Route::get('/list-favorites', 'Kinopoisk\Viewer\FilmController@listFavorites');
                        Route::post('/add-in-favorites', 'Kinopoisk\Viewer\FilmController@addInFavorites');

                        Route::post('/add-evaluation', 'Kinopoisk\Viewer\FilmController@addEvaluation');

                    }
                );

                Route::group(
                    ['prefix' => 'genres'],
                    function(){
                        Route::get('/list-genres', 'Kinopoisk\Viewer\GenreController@listGenres');
                    }
                );

                Route::group(
                    ['prefix' => 'lists'],
                    function(){
                        Route::get('/list-categories', 'Kinopoisk\Viewer\ListCategoryController@list');

                    }
                );

                Route::group(
                    ['prefix' => 'reviews'],
                    function (){
                        Route::get('/test', 'Kinopoisk\Viewer\ReviewController@test');


                        Route::get('/list', 'Kinopoisk\Viewer\ReviewController@list');

                        Route::post('/create', 'Kinopoisk\Viewer\ReviewController@create');
                        Route::post('/delete', 'Kinopoisk\Viewer\ReviewController@delete');
                        Route::post('/update', 'Kinopoisk\Viewer\ReviewController@update');
                    }
                );
            }
        );
    }
);
