<?php

namespace App\Services\User\ShowEditUserForm;

use Illuminate\Support\Facades\Auth;

/**
 * Class ShowEditUserFormService
 * @package App\Services\User\ShowEditUserForm
 */
class ShowEditUserFormService
{

    /**
     * @return ShowEditUserFormResponse
     */
    public function exec(): ShowEditUserFormResponse
    {
        $response = new ShowEditUserFormResponse();
        $response->setUser(Auth::user());

        return $response;
    }
}
