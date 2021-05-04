<?php


namespace App\Services\AdminUser\ShowEditUserForm;

use App\Services\AdminUser\ShowEditUserForm\ShowEditUserFormResponse;
use App\Services\User\UserRepositoryInterface;

class ShowEditUserFormService
{
    /**
     * @var
     */
    private $user_repository;

    /**
     * ShowEditUserFormService constructor.
     * @param \App\Services\User\UserRepositoryInterface $user_repository
     */
    public function __construct(UserRepositoryInterface  $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    /**
     * @param $user_id
     * @return ShowEditUserFormResponse
     */
    public function exec($user_id): ShowEditUserFormResponse
    {
        $response = new ShowEditUserFormResponse();
        $user = $this->user_repository->fetchWithProjectsThroughApplicationOrAssignment($user_id);
        $response->setUser($user);

        return $response;
    }
}
