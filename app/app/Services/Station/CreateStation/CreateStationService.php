<?php


namespace App\Services\Station\CreateStation;


use App\Services\Station\StationRepositoryInterface;

class CreateStationService
{
    /**
     * @var StationRepositoryInterface
     */
    private $station_repository;

    public function __construct(StationRepositoryInterface $station_repository)
    {
        $this->station_repository = $station_repository;
    }

    public function exec($request)
    {
        return $this->station_repository->create($request);
    }
}
