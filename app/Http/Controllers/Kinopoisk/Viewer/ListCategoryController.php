<?php

namespace App\Http\Controllers\Kinopoisk\Viewer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Kinopoisk\Viewer\ListCategories\ListCategoriesResource;
use App\Models\ListCategory;
use Illuminate\Http\Request;

class ListCategoryController extends Controller
{


    public function list(){

        return ListCategoriesResource::collection(ListCategory::all());

    }


}
