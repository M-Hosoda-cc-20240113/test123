<?php

namespace App\Services\Station;

use App\Models\Station;
use App\Services\Station\CreateStation\CreateStationParameter;
use App\Services\Station\DeleteStation\DeleteStationParameter;
use Illuminate\Database\Eloquent\Collection;

interface AreaRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param CreateStationParameter $parameter
     */
    public function create(CreateStationParameter $parameter): void;

    /**
     * @param DeleteStationParameter $parameter
     * @return \App\Models\Station
     */
    public function delete(DeleteStationParameter $parameter): Station;
}
