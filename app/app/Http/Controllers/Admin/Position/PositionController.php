<?php

namespace App\Http\Controllers\Admin\Position;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Position\CreatePositionRequest;
use App\Http\Requests\Admin\Position\DeletePositionRequest;
use App\Services\Position\CreatePosition\CreatePositionParameter;
use App\Services\Position\CreatePosition\CreatePositionService;
use App\Services\Position\DeletePosition\DeletePositionParameter;
use App\Services\Position\DeletePosition\DeletePositionService;
use App\Services\Position\PositionList\PositionListResponse;
use App\Services\Position\PositionList\PositionListService;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{

    /**
     * @param PositionListService $position_list_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(PositionListService $position_list_service)
    {
        $response = new PositionListResponse();

        $positions = $position_list_service->exec();

        $response->setPositions($positions);

        return view('admin.pages.position.list.list', ['response' => $response]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createForm()
    {
        return view('admin.pages.position.create.create');
    }

    /**
     * @param CreatePositionRequest $request
     * @param CreatePositionService $create_position_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function create(CreatePositionRequest $request, CreatePositionService $create_position_service)
    {
        $parameter = new CreatePositionParameter();
        $parameter->setName($request->name);

        DB::transaction(function () use ($create_position_service, $parameter){
            $create_position_service->exec($parameter);
        });
        return redirect()->route('position.list');
    }


    /**
     * @param DeletePositionRequest $request
     * @param DeletePositionService $delete_position_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete(DeletePositionRequest $request, DeletePositionService $delete_position_service)
    {
        $parameter = new DeletePositionParameter();
        $parameter->setPositionId($request->position_id ?? '');
        DB::transaction(function () use ($delete_position_service, $parameter){
            $delete_position_service->exec($parameter);
        });

        return redirect()->route('position.list');
    }
}
