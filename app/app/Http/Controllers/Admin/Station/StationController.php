<?php

namespace App\Http\Controllers\Admin\Station;

use App\Http\Controllers\Controller;
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

        $response->setProjects($stations);

        return view('admin.pages.station.list.list', ['response' => $response]);
    }

    /**
     *
     */
    public function showCreateForm()
    {
        //
    }

    /**
     *
     */
    public function create(Request $request)
    {
        //
    }
}
