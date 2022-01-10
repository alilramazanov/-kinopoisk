<?php

namespace App\Http\Resources\Kinopoisk\Viewer\Film;

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
            'rating' => "Рейтинг в разработке",
            'numberOfRating' => 'подсчет колличества оценок в разработке'
        ];
    }
}
