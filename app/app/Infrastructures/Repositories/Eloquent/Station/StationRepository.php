<?php

namespace App\Infrastructures\Repositories\Eloquent\Station;

use App\Http\Requests\Admin\Station\CreateStationRequest;
use App\Models\Area;
use App\Models\Station;
use App\Services\Station\CreateStation\CreateStationParameter;
use App\Services\Station\StationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StationRepository implements StationRepositoryInterface
{
    /**
     * @inheritDoc
     * station with area
     */
    public function all(): Collection
    {
        return Station::all();
    }

    /**
     * @inheritDoc
     */
    public function create(CreateStationParameter $parameter): void
    {
        $station = new Station();
        $area_name = $parameter->getArea();
        $area = Area::firstOrCreate(['name' => $area_name]);
        $station->name = $parameter->getName();
        $station->area_id =  $area->id;
        $station->save();
    }
}
