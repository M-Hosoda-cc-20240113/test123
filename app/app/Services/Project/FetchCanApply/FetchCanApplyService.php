<?php


namespace App\Services\Project\FetchCanApply;


use App\Services\Pagination\PaginatorService;
use App\Services\Project\ProjectRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class FetchCanApplyService
{
    /**
     * @var ProjectRepositoryInterface
     */
    private $project_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * FetchCanApplyService constructor.
     * @param \App\Services\Project\ProjectRepositoryInterface $project_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(ProjectRepositoryInterface $project_repository, PaginatorService $paginator_service)
    {
        $this->project_repository = $project_repository;
        $this->paginator_service = $paginator_service;
    }

    public function exec(): LengthAwarePaginator
    {
        $projects = $this->project_repository->fetchCanApply();
        return $this->paginator_service->paginate($projects);
    }

}
