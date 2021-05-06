<?php


namespace App\Services\Agent\AgentList;

use App\Models\Agent;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class AgentListResponse
 * @package App\Services\Agent\AgentList
 */
class AgentListResponse
{
    /**
     * @var Agent[]
     */
    private $agents;

    /**
     * @return LengthAwarePaginator
     */
    public function getAgents(): LengthAwarePaginator
    {
        return $this->agents;
    }

    /**
     * @param LengthAwarePaginator $agents
     * @return AgentListResponse
     */
    public function setAgents(LengthAwarePaginator $agents): AgentListResponse
    {
        $this->agents = $agents;
        return $this;
    }
}
