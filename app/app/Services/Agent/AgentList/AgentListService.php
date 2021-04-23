<?php


namespace App\Services\Agent\AgentList;

use App\Services\Agent\AgentRepositoryInterface;

class AgentListService
{
    /**
     * @var AgentRepositoryInterface
     */
    private $agent_repository;

    /**
     * AgentListService constructor.
     * @param \App\Services\Agent\AgentRepositoryInterface $agent_repository
     */
    public function __construct(AgentRepositoryInterface $agent_repository)
    {
        $this->agent_repository = $agent_repository;
    }

    public function exec()
    {
        return $this->agent_repository->all();
    }
}
