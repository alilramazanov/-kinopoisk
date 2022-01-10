<?php

namespace App\Http\Filters;

abstract class QueryFilter
{
    protected $builder;
    protected $request;

    public function __construct($request, $builder){
        $this->request = $request;
        $this->builder = $builder;
    }

    public function apply(){
        foreach ($this->getFilterParameters($this->request) as $filter => $value){
            if (method_exists($this, $filter)){
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

    public function getFilterParameters($request){

        $filterParameters = json_decode($this->request->filter, true);

        return $filterParameters;
    }
}
