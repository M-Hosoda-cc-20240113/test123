<?php

namespace App\Http\Controllers\Admin\Position;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * 
     * Admin index
     * @var array
     */
    public function list()
    {
        return 'Positions list';
    }
}
