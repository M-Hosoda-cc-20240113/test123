<?php


namespace App\Services\Station\DeleteStation;


use App\Services\Station\StationRepositoryInterface;

/**
 * Class DeleteStationService
 * @package App\Services\Station\DeleteStation
 */
class DeleteStationService
{
    /**
     * @var StationRepositoryInterface
     */
    private $station_repository;

    /**
     * CreateStationService constructor.
     * @param StationRepositoryInterface $station_repository
     */
    public function __construct(StationRepositoryInterface $station_repository)
    {
        $this->station_repository = $station_repository;
    }

    /**
     * @param DeleteStationParameter $parameter
s     */
    public function exec(DeleteStationParameter $parameter)
    {
        $this->station_repository->delete($parameter);
    }
}
