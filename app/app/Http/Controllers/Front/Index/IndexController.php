<?php

namespace App\Http\Controllers\Front\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Top\FetchTopData\FetchTopResponse;
use App\Services\Top\FetchTopData\FetchTopService;

class IndexController extends Controller
{
    /**
     * 
     * Front index
     * @var array
     */
    public function index(FetchTopService $fetch_top_data_service)
     {
        $response = $fetch_top_data_service->exec();
        return view('front.pages.top.top', ['response' => $response]);
     }
    /**
     * 
     * Front index
     * @var array
     */
    public function show()
    {
        return view('front.welcome');
    }
}
