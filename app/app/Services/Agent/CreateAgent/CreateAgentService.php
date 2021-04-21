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

    public function exec($agent_name)
    {
        $this->agent_repository->create($agent_name);
    }
}
