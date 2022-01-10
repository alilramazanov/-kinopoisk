<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected $model;

    public function __construct(){
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    public function startConditions(){
        return clone $this->model;
    }

}
