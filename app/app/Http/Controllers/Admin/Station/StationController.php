<?php

namespace App\Http\Controllers\Admin\Station;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Station\CreateStationRequest;
use App\Services\Area\AreaList\AreaListResponse;
use App\Services\Area\AreaList\AreaListService;
use App\Services\Station\CreateStation\CreateStationService;
use App\Services\Station\StationList\StationListResponse;
use App\Services\Station\StationList\StationListService;
use Illuminate\Http\Request;

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
     */
    public function create(CreateStationRequest $request, CreateStationService $create_station_service)
    {
        $create_station_service->exec($request->all());
        return redirect()->route('station.list');
    }
}
