<?php

namespace App\Services\Station\StationList;

use App\Models\Station;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class StationListResponse
{
  /**
   * @var Station[]
   */
  private $stations;

    /**
     * Get the value of projects
     *
     * @return LengthAwarePaginator
     */
  public function getStations(): LengthAwarePaginator
  {
    return $this->stations;
  }

    /**
     * Set the value of projects
     *
     * @param LengthAwarePaginator $stations
     * @return StationListResponse
     */
  public function setStations(LengthAwarePaginator $stations): StationListResponse
  {
    $this->stations = $stations;
    return $this;
  }
}
