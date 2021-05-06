<?php

namespace App\Services\Assignment\AssignmentList;

use App\Services\Assignment\AssignmentRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class AssignmentListService
 * @package App\Services\Assignment\AssignmentList
 */
class AssignmentListService
{
    /**
     * @var AssignmentRepositoryInterface
     */
    private $assignment_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * AssignmentListService constructor.
     * @param \App\Services\Assignment\AssignmentRepositoryInterface $assignment_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(
        AssignmentRepositoryInterface $assignment_repository,
        PaginatorService $paginator_service
    ) {
        $this->assignment_repository = $assignment_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $assignments = $this->assignment_repository->all();
        return $this->paginator_service->paginate($assignments);
    }
}
