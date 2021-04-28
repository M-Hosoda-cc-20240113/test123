<?php


namespace App\Services\User\DeleteUser;


use App\Models\User;
use App\Services\User\UserRepositoryInterface;

class DeleteUserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * DeleteUserService constructor.
     * @param UserRepositoryInterface $user_repository
     */
    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    /**
     * @param int $user_id
     * @return void
     */
    public function exec(int $user_id): void
    {
        $this->user_repository->delete($user_id);
    }
}
