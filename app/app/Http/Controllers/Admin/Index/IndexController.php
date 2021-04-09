<?php

namespace App\Http\Controllers\Admin\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
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
