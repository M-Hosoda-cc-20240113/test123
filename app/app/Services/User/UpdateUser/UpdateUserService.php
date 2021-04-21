<?php

namespace App\Services\User\UpdateUser;

use App\Services\User\UserRepositoryInterface;

/**
 * Class UpdateUserService
 * @package App\Services\User\EditUser
 */
class UpdateUserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * UpdateUserService constructor.
     * @param UserRepositoryInterface $user_repository
     */
    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    /**
     * @throws \Throwable
     */
    public function exec(UpdateUserParameter $parameter) {
        $this->user_repository->update($parameter);
    }
}
