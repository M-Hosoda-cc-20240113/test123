<?php


namespace App\Services\Station\CreateStation;


use App\Services\Station\StationRepositoryInterface;

class CreateStationService
{
    /**
     * @var StationRepositoryInterface
     */
    private $station_repository;

    /**
     * CreateStationService constructor.
     * @param \App\Services\Station\StationRepositoryInterface $station_repository
     */
    public function __construct(StationRepositoryInterface $station_repository)
    {
        $this->station_repository = $station_repository;
    }

    /**
     * @param CreateStationParameter $parameter
     */
    public function exec(CreateStationParameter $parameter)
    {
        $this->station_repository->create($parameter);
    }
}
