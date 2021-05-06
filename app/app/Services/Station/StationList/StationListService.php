<?php

namespace App\Services\Station\StationList;

use App\Services\Pagination\PaginatorService;
use App\Services\Station\StationRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class StationListService
 * @package App\Services\Station\StationList
 */
class StationListService
{
    /**
     * @var StationRepositoryInterface
     */
    private $station_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * StationListService constructor.
     * @param \App\Services\Station\StationRepositoryInterface $station_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(
        StationRepositoryInterface $station_repository,
        PaginatorService $paginator_service
    ) {
        $this->station_repository = $station_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $station = $this->station_repository->all();
        return $this->paginator_service->paginate($station);
    }
}
