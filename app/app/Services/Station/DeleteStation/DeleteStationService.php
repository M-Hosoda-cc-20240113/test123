<?php


namespace App\Services\Station\DeleteStation;


use App\Services\Station\AreaRepositoryInterface;

/**
 * Class DeleteStationService
 * @package App\Services\Station\DeleteStation
 */
class DeleteStationService
{
    /**
     * @var AreaRepositoryInterface
     */
    private $station_repository;

    /**
     * CreateStationService constructor.
     * @param AreaRepositoryInterface $station_repository
     */
    public function __construct(AreaRepositoryInterface $station_repository)
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
