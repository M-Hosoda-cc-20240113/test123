<?php


namespace App\Services\Area\AreaList;

use App\Services\Area\AreaRepositoryInterface;

class AreaListService
{
    /**
     * @var
     */
    private $area_repository;

    /**
     * AreaListResponse constructor.
     * @param \App\Services\Area\AreaRepositoryInterface $area_repository
     */
    public function __construct(AreaRepositoryInterface $area_repository)
    {
        $this->area_repository = $area_repository;
    }

    public function exec()
    {
        return $this->area_repository->all();
    }
}
