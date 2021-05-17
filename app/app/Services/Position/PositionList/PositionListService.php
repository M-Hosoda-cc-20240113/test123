<?php

namespace App\Services\Position\PositionList;

use App\Services\Pagination\PaginatorService;
use App\Services\Position\PositionRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class PositionListService
 * @package App\Services\Position\PositionList
 */
class PositionListService
{
    /**
     * @var PositionRepositoryInterface
     */
    private $position_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * PositionListService constructor.
     * @param PositionRepositoryInterface $position_repository
     * @param PaginatorService $paginator_service
     */
    public function __construct(
        PositionRepositoryInterface $position_repository,
        PaginatorService $paginator_service
    ) {
        $this->position_repository = $position_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $position = $this->position_repository->all();
        return $this->paginator_service->paginate($position);
    }
}
