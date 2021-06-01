<?php

namespace App\Http\Controllers\Front\Feature;

use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    public function showUserPolicy()
    {
        return view('front.pages.features._user_policy');
    }

    public function showPrivacyPolicy()
    {
        return view('front.pages.features._privacy_policy');
    }
}
