<?php

namespace App\Http\Resources\Kinopoisk\Viewer\Film;

use App\Http\Statistic\Film\GeneralFilmStatistic;
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

        $generalFIlmStatistic = new GeneralFilmStatistic();

        return [
            'id' => $this->id,
           'name' => $this->name,
            'description' => $this->description,
            'country' => $this->country->name,
            'worldPremier' => $this->world_premiere,
            'budget' => $this->budget,
            'feesInWorld' => $this->fees_in_world,
            'overview' => $this->overview,
            'rating' => $generalFIlmStatistic->getALlRating($this->id),
            'numberOfScore' => $generalFIlmStatistic->getAllScores($this->id),
            'список похожих фильмов в разработке',
            'процентный рейтинг кинокритиков в разработке',
            'входит в топ 250 в разработке',
            'факты о фильме в разработке',
            'материалы (статьи) о фильме в разработке',
            'рецензии в разработке ' => [
                'список рецензий кинокритиков в разработке',
                'рецензии зрителей в разработке' => [
                    'список рецензий зрителей в разработке',
                    'подсчет рецензий в разработке',
                        'подсчет положительных рецензий и их процент в разработке',
                    'подсчет отрицательных рецензий и их процент в разработке',
                    'подсчет нейтральных рецензий и их подсчет в разработке'
                ]
            ]
        ];
    }
}
