<?php

namespace App\Infrastructures\Repositories\Eloquent\Station;

use App\Models\Station;
use App\Services\Station\StationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StationRepository implements StationRepositoryInterface
{
  /**
   * @inheritDoc
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
        return Station::create([
            'name'      => $request['name'],
            'area_id'   => $request['area_id'],
        ]);
    }
}
