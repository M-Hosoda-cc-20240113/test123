<?php


namespace App\Services\Agent;


use App\Models\Agent;
use App\Services\Agent\CreateAgent\CreateAgentParameter;
use App\Services\Agent\DeleteAgent\DeleteAgentParameter;
use App\Services\Station\CreateStation\CreateStationParameter;
use Illuminate\Support\Collection;

interface AgentRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * 新規エージェント登録
     * @param CreateAgentParameter $parameter
     */
    public function create(CreateAgentParameter $parameter): void;

    /**
     * @param DeleteAgentParameter $parameter
     * @return Agent
     */
    public function delete(DeleteAgentParameter $parameter): Agent;
}
