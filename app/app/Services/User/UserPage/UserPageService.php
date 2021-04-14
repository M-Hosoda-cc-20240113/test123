<?php


namespace App\Services\User\UserPage;


use App\Services\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserPageService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function exec(): \App\Models\User
    {
        $user_id = Auth::user()->id;
        return $this->user_repository->detail($user_id);
    }
}
