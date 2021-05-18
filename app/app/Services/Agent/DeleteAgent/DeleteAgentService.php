<?php


namespace App\Services\Agent\DeleteAgent;


use App\Services\Agent\AgentRepositoryInterface;

class DeleteAgentService
{
    /**
     * @var AgentRepositoryInterface
     */
    private $agent_repository;

    /**
     * DeleteAgentService constructor.
     * @param AgentRepositoryInterface $agent_repository
     */
    public function __construct(AgentRepositoryInterface $agent_repository)
    {
        $this->agent_repository = $agent_repository;
    }

    /**
     * @param DeleteAgentParameter $parameter
     */
    public function exec(DeleteAgentParameter $parameter)
    {
        $this->agent_repository->delete($parameter);
    }
}
