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
    private $assignment_reopsitory;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * AssignmentListService constructor.
     * @param \App\Services\Assignment\AssignmentRepositoryInterface $assignment_reopsitory
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(
        AssignmentRepositoryInterface $assignment_reopsitory,
        PaginatorService $paginator_service
    ) {
        $this->assignment_reopsitory = $assignment_reopsitory;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $assignments = $this->assignment_reopsitory->all();
        return $this->paginator_service->paginate($assignments);
    }
}
