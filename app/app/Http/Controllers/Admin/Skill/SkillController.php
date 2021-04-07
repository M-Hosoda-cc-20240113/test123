<?php

namespace App\Http\Controllers\Admin\Skill;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * 
     * Admin skill list
     * @var array
     */
    public function list()
    {
        return 'Skills list';
    }

    /**
     * 
     * Admin skill edit
     * @var array
     */
    public function edit()
    {
        return 'Skills edit';
    }
}
