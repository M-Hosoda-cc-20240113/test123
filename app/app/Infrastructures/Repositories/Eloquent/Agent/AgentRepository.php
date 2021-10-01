<?php


namespace App\Infrastructures\Repositories\Eloquent\Agent;

use App\Models\Agent;
use App\Services\Agent\AgentRepositoryInterface;
use App\Services\Agent\CreateAgent\CreateAgentParameter;
use App\Services\Agent\DeleteAgent\DeleteAgentParameter;
use Illuminate\Support\Collection;

class AgentRepository implements AgentRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return Agent::all()->sortByDesc('id');
    }

    /**
     * @inheritDoc
     */
    public function create(CreateAgentParameter $parameter): void
    {
        $agent = new Agent();
        $agent->name = $parameter->getName();
        $agent->save();
    }

    /**
     * @inheritDoc
     */
    public function delete(DeleteAgentParameter $parameter): Agent
    {
        $agent = Agent::findOrFail($parameter->getAgentId());
        $agent->delete();
        return $agent;
    }
}
