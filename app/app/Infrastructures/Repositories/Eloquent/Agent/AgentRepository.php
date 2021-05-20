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
        $agent->tel_hash = hash(config('app.hash_email.algo'), $parameter->getTel() . config('app.hash_email.salt'));
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

    /**
     * {@inheritDoc}
     */
    public function makeTelHash(string $tel): string
    {
        return hash(config('app.hash_email.algo'), $tel . config('app.hash_email.salt'));
    }

    /**
     * {@inheritDoc}
     */
    public function findByTel(string $tel): ?Agent
    {
        return Agent::where('tel_hash', $this->makeTelHash($tel))->first();
    }
}
