<?php


namespace App\Services\Agent\AgentList;

use App\Services\Agent\AgentRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class AgentListService
 * @package App\Services\Agent\AgentList
 */
class AgentListService
{
    /**
     * @var AgentRepositoryInterface
     */
    private $agent_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * AgentListService constructor.
     * @param \App\Services\Agent\AgentRepositoryInterface $agent_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(
        AgentRepositoryInterface $agent_repository,
        PaginatorService $paginator_service
    ) {
        $this->agent_repository = $agent_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $agent = $this->agent_repository->all();
        return $this->paginator_service->paginate($agent);
    }
}
