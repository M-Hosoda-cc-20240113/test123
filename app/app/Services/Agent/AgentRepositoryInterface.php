<?php


namespace App\Services\Agent;


use App\Models\Agent;
use Illuminate\Support\Collection;

interface AgentRepositoryInterface
{
    /**
     *
     */
    public function all(): Collection;

    /**
     * 新規エージェント登録
     * @param $request
     */
    public function create($request);
}
