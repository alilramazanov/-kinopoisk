<?php

namespace App\Http\Requests\Kinopoisk\Viewer\Film;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class AddEvaluationRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'film_id' => 'exists:films,id|integer',
            'score' => 'integer|max:10|min:1'
        ];
    }
}
