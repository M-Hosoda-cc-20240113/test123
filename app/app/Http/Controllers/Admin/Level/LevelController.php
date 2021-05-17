<?php

namespace App\Http\Controllers\Admin\Level;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Level\CreateLevelRequest;
use App\Http\Requests\Admin\Level\DeleteLevelRequest;
use App\Services\Level\CreateLevel\CreateLevelParameter;
use App\Services\Level\CreateLevel\CreateLevelService;
use App\Services\Level\DeleteLevel\DeleteLevelParameter;
use App\Services\Level\DeleteLevel\DeleteLevelService;
use App\Services\Level\LevelList\LevelListResponse;
use App\Services\Level\LevelList\LevelListService;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    /**
     * @param LevelListService $level_list_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(LevelListService $level_list_service)
    {
        $response = new LevelListResponse();

        $levels = $level_list_service->exec();

        $response->setLevels($levels);

        return view('admin.pages.level.list.list', ['response' => $response]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createForm()
    {
        return view('admin.pages.level.create.create');
    }


    /**
     * @param CreateLevelRequest $request
     * @param CreateLevelService $create_level_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function create(CreateLevelRequest $request, CreateLevelService $create_level_service)
    {
        $parameter = new CreateLevelParameter();
        $parameter->setLevel($request->level);

        DB::transaction(function () use ($create_level_service, $parameter) {
            $create_level_service->exec($parameter);
        });

        return redirect()->route('level.list');
    }


    /**
     * @param DeleteLevelRequest $request
     * @param DeleteLevelService $delete_level_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete(DeleteLevelRequest $request, DeleteLevelService $delete_level_service)
    {
        $parameter = new DeleteLevelParameter();
        $parameter->setLevelId($request->level_id);

        DB::transaction(function () use ($delete_level_service, $parameter) {
            $delete_level_service->exec($parameter);
        });

        return redirect()->route('level.list');
    }
}
