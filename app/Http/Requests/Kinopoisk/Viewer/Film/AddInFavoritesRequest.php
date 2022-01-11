<?php

namespace App\Http\Requests\Kinopoisk\Viewer\Film;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class AddInFavoritesRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'film_id' => 'exists:films,id|required|integer'
        ];
    }
}
