<?php

namespace App\Http\Controllers\Front\Passive;

use App\Http\Controllers\Controller;

class PassiveController extends Controller
{
    public function lp()
    {
       return view('statics.lp');
    }
}
