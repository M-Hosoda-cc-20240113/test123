<?php

namespace App\Http\Controllers\Admin\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Agent\CreateAgentRequest;
use App\Http\Requests\Admin\Agent\DeleteAgentRequest;
use App\Services\Agent\DeleteAgent\DeleteAgentParameter;
use App\Services\Agent\DeleteAgent\DeleteAgentService;
use App\Services\Agent\AgentList\AgentListResponse;
use App\Services\Agent\AgentList\AgentListService;
use App\Services\Agent\CreateAgent\CreateAgentParameter;
use App\Services\Agent\CreateAgent\CreateAgentService;
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
        $parameter->setTel($request->tel);

        DB::transaction(function () use ($create_agent_service ,$parameter) {
            $create_agent_service->exec($parameter);
        });
        return redirect()->route('agent.list');
    }

    /**
     * @param DeleteAgentRequest $request
     * @param DeleteAgentService $delete_agent_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete(DeleteAgentRequest $request, DeleteAgentService $delete_agent_service)
    {
        $parameter = new DeleteAgentParameter();
        $parameter->setAgentId($request->agent_id);

        DB::transaction(function () use ($delete_agent_service ,$parameter) {
            $delete_agent_service->exec($parameter);
        });

        return redirect()->route('agent.list');
    }
}
