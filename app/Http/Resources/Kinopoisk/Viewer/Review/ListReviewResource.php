<?php

namespace App\Http\Resources\Kinopoisk\Viewer\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class ListReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'reviewMoodId' => $this->review_mood_id,
            'createdAt' => $this->created_at

        ];
    }
}
