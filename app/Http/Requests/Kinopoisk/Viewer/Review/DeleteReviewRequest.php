<?php

namespace App\Http\Requests\Kinopoisk\Viewer\Review;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class DeleteReviewRequest extends ApiRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'exists:reviews,id|integer'
        ];
    }
}
