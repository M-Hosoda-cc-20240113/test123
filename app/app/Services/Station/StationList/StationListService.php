<?php

namespace App\Services\Station\StationList;

use App\Services\Station\StationRepositoryInterface;

class StationListService
{
  /**
   * @var StationRepositoryInterface
   */
  private $station_reopsitory;

  public function __construct(StationRepositoryInterface $station_repository) 
  {
    $this->station_reopsitory = $station_repository; 
  }

  public function exec()
  {
    return $this->station_reopsitory->all();
  }
}
