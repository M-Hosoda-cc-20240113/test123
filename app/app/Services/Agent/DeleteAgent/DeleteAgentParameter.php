<?php


namespace App\Services\Agent\DeleteAgent;


/**
 * Class DeleteAgentParameter
 * @package App\Services\Agent\DeleteAgent
 */
class DeleteAgentParameter
{
    /**
     * @var string
     */
    private $agent_id;

    /**
     * @return string
     */
    public function getAgentId(): string
    {
        return $this->agent_id;
    }

    /**
     * @param string $agent_id
     * @return DeleteAgentService
     */
    public function setAgentId(string $agent_id): DeleteAgentParameter
    {
        $this->agent_id = $agent_id;
        return $this;
    }
}
