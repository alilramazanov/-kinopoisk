<?php

namespace App\Http\Statistic;

abstract class StatisticCore
{
    protected $filmId;
    protected $isCritic;

    public function __construct($filmId, $isCritic){
        $this->filmId = $filmId;
        $this->isCritic = $isCritic;

    }

}
