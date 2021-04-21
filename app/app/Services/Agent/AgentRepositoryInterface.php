<?php


namespace App\Services\Agent;


use App\Models\Agent;

interface AgentRepositoryInterface
{
    /**
     * 新規エージェント登録
     * @param $request
     */
    public function create($request);
}
