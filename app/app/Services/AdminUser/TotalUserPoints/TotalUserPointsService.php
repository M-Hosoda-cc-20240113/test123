<?php


namespace App\Services\AdminUser\TotalUserPoints;


use App\Services\User\UserRepositoryInterface;

class TotalUserPointsService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    /**
     * TotalUserPointsService constructor.
     * @param \App\Services\User\UserRepositoryInterface $user_repository
     */
    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function exec(TotalUserPointsParameter $parameter)
    {
        $this->user_repository->insertUserPoints($parameter);
    }
}
