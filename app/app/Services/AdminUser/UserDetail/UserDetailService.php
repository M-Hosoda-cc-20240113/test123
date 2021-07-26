<?php

namespace App\Services\AdminUser\UserDetail;

use App\Services\RelLevelSkillUser\RelLevelSkillUserRepositoryInterface;
use App\Services\User\UserRepositoryInterface;

class UserDetailService
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;
    /**
     * @var \App\Services\RelLevelSkillUser\RelLevelSkillUserRepositoryInterface
     */
    private $relLevelSKillUser_repository;

    public function __construct(
        UserRepositoryInterface $user_repository,
        RelLevelSkillUserRepositoryInterface $relLevelSKillUser_repository
    ) {
        $this->user_repository = $user_repository;
        $this->relLevelSKillUser_repository = $relLevelSKillUser_repository;
    }

    /**
     * @param int $user_id
     * @return \App\Services\AdminUser\UserDetail\UserDetailResponse
     */
    public function exec(int $user_id): UserDetailResponse
    {
        $response = new UserDetailResponse();
        $invited_user_list = $this->user_repository->invitedUserList($user_id);
        $user = $this->user_repository->fetchWithProjectsThroughApplicationOrAssignment($user_id);
        $response->setUser($user);
        $response->setInvitedUsers($invited_user_list);

        $LevelSkillUSer = $this->relLevelSKillUser_repository->fetchByUserId($user_id);
        $response->setRelLevelSkillUSer($LevelSkillUSer);

        return $response;
    }
}
