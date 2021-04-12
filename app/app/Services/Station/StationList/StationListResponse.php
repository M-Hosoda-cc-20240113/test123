<?php

namespace App\Services\Station\StationList;

use App\Models\Station;
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
   * @return  Station[]
   */ 
  public function getStations()
  {
    return $this->stations;
  }

  /**
   * Set the value of projects
   *
   * @param  Station[]  $projects
   *
   * @return  self
   */ 
  public function setStations(Collection $stations)
  {
    $this->stations = $stations;

    return $this;
  }
}
