<?php

namespace App\Http\Controllers\Admin\Index;

use App\Http\Controllers\Controller;
use App\Services\AdminDashboard\FetchDashboard\FetchDashboardService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * IndexController constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }


    /**
     * Admin Dashboard
     *
     * @param FetchDashboardService $fetch_dashboard_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(FetchDashboardService $fetch_dashboard_service)
    {
        $response = $fetch_dashboard_service->exec();
        return view('admin.pages.dashboard.dashboard', ['response' => $response]);
    }
}
