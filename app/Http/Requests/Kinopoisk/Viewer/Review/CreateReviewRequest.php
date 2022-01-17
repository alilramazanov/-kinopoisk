<?php

namespace App\Http\Requests\Kinopoisk\Viewer\Review;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100|min:3|string',
            'text' => 'string|required|min:10',
            'user_id' => 'required|exists:users,id|integer',
            'film_id' => 'required|exists:films,id|integer',
            'review_mood_id' => 'required|min:1|max:3|integer|exists:review_moods,id',
            'is_critic' => 'boolean'
        ];
    }
}
