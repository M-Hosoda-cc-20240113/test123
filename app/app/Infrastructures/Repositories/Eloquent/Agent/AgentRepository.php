<?php


namespace App\Infrastructures\Repositories\Eloquent\Agent;

use App\Models\Agent;
use App\Services\Agent\AgentRepositoryInterface;

class AgentRepository implements AgentRepositoryInterface
{
    public function create($request)
    {
        return Agent::create([
            'name'  => $request['name'],
        ]);
    }
}
