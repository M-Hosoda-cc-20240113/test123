<?php

namespace App\Http\Controllers\Admin\Station;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Station\CreateStationRequest;
use App\Http\Requests\Admin\Station\DeleteStationRequest;
use App\Services\Area\AreaList\AreaListResponse;
use App\Services\Area\AreaList\AreaListService;
use App\Services\Station\CreateStation\CreateStationParameter;
use App\Services\Station\CreateStation\CreateStationService;
use App\Services\Station\DeleteStation\DeleteStationParameter;
use App\Services\Station\DeleteStation\DeleteStationService;
use App\Services\Station\StationList\StationListResponse;
use App\Services\Station\StationList\StationListService;
use Illuminate\Support\Facades\DB;

class StationController extends Controller
{
    /**
     *
     */
    public function list(StationListService $station_list_service)
    {
        $response = new StationListResponse();

        $stations = $station_list_service->exec();

        $response->setStations($stations);

        return view('admin.pages.station.list.list', ['response' => $response]);
    }

    /**
     *
     */
    public function showCreateForm(AreaListService $area_list_service)
    {
        $response = new AreaListResponse();

        $areas = $area_list_service->exec();

        $response->setAreas($areas);

        return view('admin.pages.station.create.create', ['response' => $response]);
    }

    /**
     * @param \App\Http\Requests\Admin\Station\CreateStationRequest $request
     * @param \App\Services\Station\CreateStation\CreateStationService $create_station_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function create(CreateStationRequest $request, CreateStationService $create_station_service)
    {
        $parameter = new CreateStationParameter();
        $parameter->setName($request->name);
        $parameter->setArea($request->area_name);

        DB::transaction(function () use ($create_station_service, $parameter) {
            $create_station_service->exec($parameter);
        });
        return redirect()->route('station.list');
    }

    /**
     * @param DeleteStationRequest $request
     * @param DeleteStationService $delete_station_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete(DeleteStationRequest $request, DeleteStationService $delete_station_service)
    {
        $parameter = new DeleteStationParameter();
        $parameter->setStationId($request->station_id);

        DB::transaction(function () use ($delete_station_service ,$parameter) {
            $delete_station_service->exec($parameter);
        });

        return redirect()->route('station.list');
    }
}
