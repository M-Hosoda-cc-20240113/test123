<?php

namespace App\Http\Controllers\Admin\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Agent\CreateAgentRequest;
use App\Services\Agent\AgentList\AgentListResponse;
use App\Services\Agent\AgentList\AgentListService;
use App\Services\Agent\CreateAgent\CreateAgentParameter;
use App\Services\Agent\CreateAgent\CreateAgentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{

    /**
     * @param \App\Services\Agent\AgentList\AgentListService $agent_list_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(AgentListService $agent_list_service)
    {
        $response = new AgentListResponse();

        $agents = $agent_list_service->exec();

        $response->setAgents($agents);

        return view('admin.pages.agent.list.list',['response' => $response]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCreateForm()
    {
        return view('admin.pages.agent.create.create');
    }

    /**
     * @param \App\Http\Requests\Admin\Agent\CreateAgentRequest $request
     * @param \App\Services\Agent\CreateAgent\CreateAgentService $create_agent_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function create(CreateAgentRequest $request, CreateAgentService $create_agent_service)
    {
        $parameter = new CreateAgentParameter();
        $parameter->setName($request->name);

        DB::transaction(function () use ($create_agent_service ,$parameter) {
            $create_agent_service->exec($parameter);
        });
        return redirect()->route('agent.list');
    }
}
