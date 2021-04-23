<?php


namespace App\Services\Agent\CreateAgent;

use App\Services\Agent\AgentRepositoryInterface;

class CreateAgentService
{
    /**
     * @var AgentRepositoryInterface
     */
    private $agent_repository;
    /**
     * CreateAgentService constructor.
     */
    public function __construct(AgentRepositoryInterface $agent_repository)
    {
        $this->agent_repository = $agent_repository;
    }

    /**
     * @param $parameter
     */
    public function exec($parameter)
    {
        $this->agent_repository->create($parameter);
    }
}
