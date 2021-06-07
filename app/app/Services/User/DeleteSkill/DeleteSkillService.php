<?php


namespace App\Services\User\DeleteSkill;


use App\Services\RelLevelSkillUser\RelLevelSkillUserRepositoryInterface;
use App\Services\RelProjectSkill\RelProjectSkillRepositoryInterface;

class DeleteSkillService
{
    /**
     * @var RelLevelSkillUserRepositoryInterface
     */
    private $rel_revel_skill_user_repository;

    /**
     * DeleteSkillService constructor.
     * @param \App\Services\RelLevelSkillUser\RelLevelSkillUserRepositoryInterface $rel_revel_skill_user_repository
     */
    public function __construct(
        RelLevelSkillUserRepositoryInterface $rel_revel_skill_user_repository
    ) {
        $this->rel_revel_skill_user_repository = $rel_revel_skill_user_repository;
    }

    /**
     * @param $user_id
     */
    public function deleteByUserId($user_id): void
    {
        $this->rel_revel_skill_user_repository->deleteByUserId($user_id);
    }
}
