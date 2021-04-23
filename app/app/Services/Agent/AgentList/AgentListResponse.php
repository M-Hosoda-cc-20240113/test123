<?php


namespace App\Services\Agent\AgentList;

use App\Models\Agent;

class AgentListResponse
{
    /**
     * @var Agent[]
     */
    private $agents;

    /**
     * @return \App\Models\Agent[]
     */
    public function getAgents()
    {
        return $this->agents;
    }

    /**
     * @param \App\Models\Agent[] $agents
     */
    public function setAgents($agents)
    {
        $this->agents = $agents;
        return $this;
    }
}
