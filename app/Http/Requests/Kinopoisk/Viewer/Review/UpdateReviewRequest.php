<?php

namespace App\Http\Requests\Kinopoisk\Viewer\Review;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:reviews,id|integer',
            'title' => 'max:100|min:3|string',
            'text' => 'string|min:10',
            'review_mood_id' => 'min:1|max:3|integer|exists:review_moods,id',
            'is_critic' => 'boolean'
        ];
    }
}
