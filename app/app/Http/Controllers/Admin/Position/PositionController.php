<?php

namespace App\Http\Controllers\Admin\Position;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Position\PositionList\PositionListResponse;
use App\Services\Position\PositionList\PositionListService;

class PositionController extends Controller
{
    /**
     * 
     * Admin list
     * @var array
     */
    public function list(PositionListService $position_list_service)
    {
        $response = new PositionListResponse();

        $positions = $position_list_service->exec();

        $response->setPositions($positions);

        return view('admin.pages.position.list.list', ['response' => $response]);
    }
}
