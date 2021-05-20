<?php

namespace App\Http\Controllers\Front\Home;

use App\Http\Controllers\Controller;
use App\Services\Mypage\MypageTopData\FetchMypageService;
use App\Services\User\UserPage\UserPageService;
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
     *
     * @param \App\Services\User\UserPage\UserPageService $user_page_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(UserPageService $user_page_service)
    {
        $response = $user_page_service->exec();
        return view('front.pages.mypage.top.top', ['response' => $response]);
    }
}
