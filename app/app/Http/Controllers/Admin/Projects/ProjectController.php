<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * 
     * Admin project index
     * @var array
     */
    public function list()
    {
        return 'Projects list';
    }

    /**
     * 
     * Admin project show
     * @var array
     */
    public function show()
    {
        return 'Projects show';
    }

    /**
     * 
     * Admin project edit
     * @var array
     */
    public function edit()
    {
        return 'Projects edit';
    }

    /**
     * 
     * Admin project delete
     * @var array
     */
    public function delete()
    {
        return 'Projects delete';
    }
}
