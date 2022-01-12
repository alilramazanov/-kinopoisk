<?php

namespace App\Http\Resources\Kinopoisk\Viewer\Film;

use App\Http\Statistic\Film\GeneralFilmStatistic;
use Illuminate\Http\Resources\Json\JsonResource;

class ListFilmsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $generalFilmStatistic = new GeneralFilmStatistic();

        $genreNames = [];
        foreach ($this->genres as $genre) {
            $genreNames[] = $genre->name;
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country->name,
            'worldPremiere' => $this->world_premiere,
            'genre' => $genreNames,
            'rating' => $generalFilmStatistic->getALlRating($this->id),
            'numberOfScore' => $generalFilmStatistic->getAllScores($this->id)
        ];
    }
}
