<?php

namespace App\Services\User\UserDetail;

use App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface;
use App\Services\RelLevelSkillUser\RelLeveSkillUserList\RelLevelSkillUserListResponse;
use App\Services\User\UserRepositoryInterface;

class UserDetailService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;
    /**
     * @var \App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface
     */
    private $relLevelSKillUser_repository;

    public function __construct(
        UserRepositoryInterface $user_repository,
        RelLevelSkillUserRepositoryInterface $relLevelSKillUser_repository
    ) {
        $this->user_repository = $user_repository;
        $this->relLevelSKillUser_repository = $relLevelSKillUser_repository;
    }

    public function exec(int $user_id)
    {
        $response = new UserDetailResponse();

        $user = $this->user_repository->detail($user_id);
        $response->setUser($user);

        $LevelSkillUSer = $this->relLevelSKillUser_repository->detail($user_id);
        $response->setRelLevelSkillUSer($LevelSkillUSer);

        return $response;
    }
}
