<?php

namespace App\Http\Controllers\Admin\Index;

use App\Http\Controllers\Controller;
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
     * 
     * Admin index
     * @var array
     */
    public function index()
    {
        return view('admin.pages.dashboard.dashboard');
    }
}
