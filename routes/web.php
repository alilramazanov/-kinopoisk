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

                    }
                );

                Route::group(
                    ['prefix' => 'genre'],
                    function(){
                        Route::get('/list-genres', 'Kinopoisk\Viewer\GenreController@listGenres');
                    }
                );
            }
        );
    }
);
