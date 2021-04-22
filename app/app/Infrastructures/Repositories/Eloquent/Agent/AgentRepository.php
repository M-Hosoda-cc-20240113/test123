<?php


namespace App\Infrastructures\Repositories\Eloquent\Agent;

use App\Models\Agent;
use App\Services\Agent\AgentRepositoryInterface;
use Illuminate\Support\Collection;

class AgentRepository implements AgentRepositoryInterface
{

    public function all(): Collection
    {
        return Agent::all();
    }

    public function create($request)
    {
        return Agent::create([
            'name'  => $request['name'],
        ]);
    }
}
