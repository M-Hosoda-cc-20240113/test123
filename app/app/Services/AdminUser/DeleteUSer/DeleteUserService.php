<?php


namespace App\Services\AdminUser\DeleteUSer;


use App\Services\User\UserRepositoryInterface;

/**
 * Class DeleteUserService
 * @package App\Services\AdminUser\DeleteUSer
 */
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
     * @param DeleteUserParameter $parameter
     */
    public function exec(DeleteUserParameter $parameter)
    {
        $this->user_repository->delete($parameter->getUserId());
    }
}
