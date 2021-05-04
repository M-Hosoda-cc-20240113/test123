<?php

namespace App\Services\Application\ApplicationList;

use App\Services\Application\ApplicationRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ApplicationListService
 * @package App\Services\Application\ApplicationList
 */
class ApplicationListService
{
    /**
     * @var ApplicationRepositoryInterface
     */
    private $application_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * ApplicationListService constructor.
     * @param \App\Services\Application\ApplicationRepositoryInterface $application_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(
        ApplicationRepositoryInterface $application_repository,
        PaginatorService $paginator_service
    ) {
        $this->application_repository = $application_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $applications = $this->application_repository->all();
        return $this->paginator_service->paginate($applications);
    }
}
