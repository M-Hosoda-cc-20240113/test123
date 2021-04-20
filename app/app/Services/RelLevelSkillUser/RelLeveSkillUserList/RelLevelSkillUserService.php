<?php


namespace App\Services\RelLevelSkillUser\RelLeveSkillUserList;


use App\Services\RelLevelSkillUser\RelLevelSkillUserRepositoryInterface;

class RelLevelSkillUserService
{
    /**
     * @var RelLevelSkillUserRepositoryInterface
     */
    private $relLevelSKillUser_repository;

    public function __construct(
        RelLevelSkillUserRepositoryInterface $relLevelSKillUser_repository
    ) {
        $this->relLevelSKillUser_repository = $relLevelSKillUser_repository;
    }

    /**
     * @param int $user_id
     * @return mixed
     */
    public function exec(int $user_id): \App\Models\RelLevelSkillUser
    {
        return $this->relLevelSKillUser_repository->fetchByUserId($user_id);
    }
}
