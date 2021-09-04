<?php


namespace App\Services\User\CreateInviteCode;


use App\Services\User\UserRepositoryInterface;

class CreateInviteCodeService
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
     * @return void
     */
    public function exec(int $user_id): void
    {
        $this->user_repository->createInviteCode($user_id);
    }
}
