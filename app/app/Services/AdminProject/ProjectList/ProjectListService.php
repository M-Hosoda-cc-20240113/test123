<?php

namespace App\Services\AdminProject\ProjectList;

use App\Services\Pagination\PaginatorService;
use App\Services\Project\ProjectRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ProjectListService
 * @package App\Services\AdminProject\ProjectList
 */
class ProjectListService
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
     * ProjectListService constructor.
     * @param ProjectRepositoryInterface $project_repository
     * @param PaginatorService $paginator_service
     */
    public function __construct(ProjectRepositoryInterface $project_repository, PaginatorService $paginator_service)
    {
        $this->project_repository = $project_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $projects = $this->project_repository->all();
        return $this->paginator_service->paginate($projects);
    }
}
