<?php

namespace App\Services\Application\ApplicationList;

use App\Services\Application\ApplicationRepositoryInterface;
use App\Services\Status\StatusRepositoryInterface;
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
     * @var StatusRepositoryInterface
     */
    private $status_repository;

     /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * ApplicationListService constructor.
     * @param \App\Services\Application\ApplicationRepositoryInterface $application_repository
     * @param \App\Services\Status\StatusRepositoryInterface $status_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(
        ApplicationRepositoryInterface $application_repository,
        StatusRepositoryInterface $status_repository,
        PaginatorService $paginator_service
    ) {
        $this->application_repository = $application_repository;
        $this->status_repository = $status_repository;
        $this->paginator_service = $paginator_service;
    }


    /**
     * @return LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $application = $this->application_repository->all();
        $status = $this->status_repository->all();
        $merged = collect();
        $merged =  $merged->merge(['applications' => $application])->merge(['statuses' => $status]);
        return $this->paginator_service->paginate($merged);
    }
}
