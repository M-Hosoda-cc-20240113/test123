<?php


namespace App\Services\User\RegisterUser;


use App\Services\User\UserRepositoryInterface;

class RegisterUserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function exec(array $request): \App\Models\User
    {
        return $this->user_repository->register($request);
    }
}
