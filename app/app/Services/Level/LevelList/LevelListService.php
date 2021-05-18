<?php


namespace App\Services\Level\LevelList;


use App\Services\Level\LevelRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class LevelListService
 * @package App\Services\Level\LevelList
 */
class LevelListService
{
    /**
     * @var LevelRepositoryInterface
     */
    private $level_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * LevelListService constructor.
     * @param \App\Services\Level\LevelRepositoryInterface $level_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(LevelRepositoryInterface $level_repository, PaginatorService $paginator_service)
    {
        $this->level_repository = $level_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $level = $this->level_repository->all();
        return $this->paginator_service->paginate($level);
    }
}
