<?php

namespace App\Http\Scribe;

abstract class Scribe
{
    protected $model;

    public function __construct(){
        $this->model = app($this->getModelClass());
    }

    protected abstract function getModelClass();

    public function startCondition(){
        return clone $this->model;
    }

}
