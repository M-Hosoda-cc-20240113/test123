<?php


namespace App\Services\User\RegisterUser;


use App\Models\User;
use App\Services\User\UserRepositoryInterface;

/**
 * Class RegisterUserService
 * @package App\Services\User\RegisterUser
 */
class RegisterUserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * RegisterUserService constructor.
     * @param UserRepositoryInterface $user_repository
     */
    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    /**
     * @param RegisterUserParameter $parameter
     * @return User
     */
    public function exec(RegisterUserParameter $parameter): User
    {
        return $this->user_repository->register($parameter);
    }
}
