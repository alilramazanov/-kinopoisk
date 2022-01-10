<?php

namespace App\Http\Resources\Kinopoisk\Viewer\Film;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailFilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  App\Http\Resources\Kinopoisk\Viewer\Film
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
           'name' => $this->name,
            'description' => $this->description,
            'country' => $this->country->name,
            'worldPremier' => $this->world_premiere,
            'budget' => $this->budget,
            'feesInWorld' => $this->fees_in_world,
            'overview' => $this->overview,
        ];
    }
}
