<?php


namespace App\Services\Agent\CreateAgent;

use App\Services\Agent\AgentRepositoryInterface;

/**
 * Class CreateAgentService
 * @package App\Services\Agent\CreateAgent
 */
class CreateAgentService
{
    /**
     * @var AgentRepositoryInterface
     */
    private $agent_repository;

    /**
     * CreateAgentService constructor.
     * @param AgentRepositoryInterface $agent_repository
     */
    public function __construct(AgentRepositoryInterface $agent_repository)
    {
        $this->agent_repository = $agent_repository;
    }

    /**
     * @param CreateAgentParameter $parameter
     */
    public function exec(CreateAgentParameter $parameter)
    {
        $this->agent_repository->create($parameter);
    }
}
