<?php


namespace App\Services\Station\CreateStation;


use App\Services\Station\AreaRepositoryInterface;

class CreateStationService
{
    /**
     * @var AreaRepositoryInterface
     */
    private $station_repository;

    /**
     * CreateStationService constructor.
     * @param \App\Services\Station\AreaRepositoryInterface $station_repository
     */
    public function __construct(AreaRepositoryInterface $station_repository)
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
