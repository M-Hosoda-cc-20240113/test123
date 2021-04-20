<?php


namespace App\Services\User\UserPage;


use App\Services\Mypage\MypageTopData\FetchMypageResponse;
use App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface;
use App\Services\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserPageService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;
    private $relLevelSKillUser_repository;

    public function __construct(
        UserRepositoryInterface $user_repository,
        RelLevelSkillUserRepositoryInterface $relLevelSKillUser_repository
    ){
        $this->user_repository = $user_repository;
        $this->relLevelSKillUser_repository = $relLevelSKillUser_repository;
    }

    public function exec(): UserPageResponse
    {
        $user_id = Auth::user()->id;
        $response = new UserPageResponse();

        $user = $this->user_repository->fetchWithProjectsThroughApplicationOrAssignment($user_id);
        $response->setUser($user);

        $LevelSkillUSer = $this->relLevelSKillUser_repository->fetchByUserId($user_id);
        $response->setRelLevelSkillUSer($LevelSkillUSer);

        return $response;
    }
}
