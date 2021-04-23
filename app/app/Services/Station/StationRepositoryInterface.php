<?php

namespace App\Services\Station;

use App\Services\Station\CreateStation\CreateStationParameter;

interface StationRepositoryInterface
{
    /**
     *
     */
    public function all();

    /**
     * @param \App\Services\Station\CreateStation\CreateStationParameter $parameter
     */
    public function create(CreateStationParameter $parameter): void;
}
