<?php

namespace App\Http\Requests\Kinopoisk\Viewer\Review;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class ListReviewRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'film_id' => 'required|integer|exists:films,id'
        ];
    }
}
