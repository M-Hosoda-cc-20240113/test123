<?php

namespace App\Infrastructures\Repositories\Eloquent\Station;

use App\Models\Area;
use App\Models\Station;
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
    public function create($request)
    {
        $area = Area::where('name',$request['area_name'])->get();
        if(empty($area[0])){
            $newArea = Area::create([
                'name' => $request['area_name'],
            ]);
            $area_id = $newArea->id;
        }else{
            $area_id = $area[0]->id;
        }
        return Station::create([
            'name' => $request['name'],
            'area_id' => $area_id,
        ]);
    }
}
