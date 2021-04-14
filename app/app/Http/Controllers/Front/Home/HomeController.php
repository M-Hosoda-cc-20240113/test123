<?php

namespace App\Http\Controllers\Front\Home;

use App\Http\Controllers\Controller;
use App\Services\User\UserPage\UserPageResponse;
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
     * @param Request $request
     * @param UserPageService $user_detail_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request, UserPageService $user_detail_service)
    {
        $response = new UserPageResponse();

        $user = $user_detail_service->exec();

        $response->setUser($user);

        return view('front.pages.mypage.top.top', ['response' => $response]);
    }

    /**
     *
     * Front user基本情報 編集
     *
     * @return string
     */
    public function edit(): string
    {
        return 'Hoge MyPage Edit';
    }

    /**
     *
     * Front user基本情報 編集
     *
     * @return string
     */
    public function skill(): string
    {
        return 'Hoge MyPage Skill';
    }
}
