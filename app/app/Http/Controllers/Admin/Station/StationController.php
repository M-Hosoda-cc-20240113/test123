<?php

namespace App\Http\Controllers\Admin\Station;

use App\Http\Controllers\Controller;
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
    public function showCreateForm()
    {
        return view('admin.pages.station.create.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\Station\CreateStation\CreateStationService $create_station_service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request, CreateStationService $create_station_service)
    {
        $create_station_service->exec($request->all());
        return redirect()->route('station.list');
    }
}
