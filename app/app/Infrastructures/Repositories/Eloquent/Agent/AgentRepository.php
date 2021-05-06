<?php


namespace App\Infrastructures\Repositories\Eloquent\Agent;

use App\Models\Agent;
use App\Services\Agent\AgentRepositoryInterface;
use App\Services\Agent\CreateAgent\CreateAgentParameter;
use Illuminate\Support\Collection;

class AgentRepository implements AgentRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return Agent::all();
    }

    /**
     * @inheritDoc
     */
    public function create(CreateAgentParameter $parameter): void
    {
        $agent = new Agent();
        $agent->name = $parameter->getName();
        $agent->tel = $parameter->getTel() ?? '';
        $agent->save();
    }
}
