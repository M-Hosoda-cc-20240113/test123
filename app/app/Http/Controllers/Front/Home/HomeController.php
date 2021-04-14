<?php

namespace App\Http\Controllers\Front\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 
     * Front index
     * @var array
     */
    public function index(Request $request)
    {
        return view('front.pages.mypage.top.top');
    }

    /**
     * 
     * Front user基本情報 編集
     * @var array
     */
    public function edit()
    {
        return 'Hoge MyPage Edit';
    }

    /**
     * 
     * Front user基本情報 編集
     * @var array
     */
    public function skill()
    {
        return 'Hoge MyPage Skill';
    }
}
