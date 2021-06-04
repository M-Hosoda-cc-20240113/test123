<?php


namespace App\Services\RelLevelSkillUser\RelLeveSkillUserList;


use App\Models\RelLevelSkillUser;
use App\Services\RelLevelSkillUser\RelLevelSkillUserRepositoryInterface;

class RelLevelSkillUserService
{
    /**
     * @var RelLevelSkillUserRepositoryInterface
     */
    private $relLevelSKillUser_repository;

    /**
     * RelLevelSkillUserService constructor.
     * @param RelLevelSkillUserRepositoryInterface $relLevelSKillUser_repository
     */
    public function __construct(
        RelLevelSkillUserRepositoryInterface $relLevelSKillUser_repository
    ) {
        $this->relLevelSKillUser_repository = $relLevelSKillUser_repository;
    }

    /**
     * @param int $user_id
     * @return RelLevelSkillUser
     */
    public function exec(int $user_id): RelLevelSkillUser
    {
        return $this->relLevelSKillUser_repository->fetchByUserId($user_id);
    }
}
