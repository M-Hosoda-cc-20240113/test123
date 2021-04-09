<?php

namespace App\Http\Controllers\Front\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * 
     * Front index
     * @var array
     */
    public function index()
    {
        return view('front.pages.top.top');
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
