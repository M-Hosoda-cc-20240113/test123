<?php

namespace App\Services\Station\StationList;

use App\Services\Station\StationRepositoryInterface;

class StationListService
{
  /**
   * @var StationRepositoryInterface
   */
  private $station_repository;

  public function __construct(StationRepositoryInterface $station_repository)
  {
    $this->station_repository = $station_repository;
  }

  public function exec()
  {
    return $this->station_repository->all();
  }
}
