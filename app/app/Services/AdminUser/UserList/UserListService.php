<?php

namespace App\Services\AdminUser\UserList;

use App\Services\Pagination\PaginatorService;
use App\Services\User\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class UserListService
 * @package App\Services\AdminUser\UserList
 */
class UserListService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * UserListService constructor.
     * @param \App\Services\User\UserRepositoryInterface $user_repository
     * @param \App\Services\Pagination\PaginatorService $paginator_service
     */
    public function __construct(UserRepositoryInterface $user_repository, PaginatorService $paginator_service)
    {
        $this->user_repository = $user_repository;
        $this->paginator_service = $paginator_service;
    }


    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $users = $this->user_repository->all();
        return $this->paginator_service->paginate($users);
    }
}
