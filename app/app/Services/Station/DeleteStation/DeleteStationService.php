<?php


namespace App\Services\Station\DeleteStation;


use App\Services\Station\StationRepositoryInterface;

class DeleteStationService
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
     * @param \App\Services\Station\DeleteStation\DeleteStationParameter $parameter
s     */
    public function exec(DeleteStationParameter $parameter)
    {
        $this->station_repository->delete($parameter);
    }
}
