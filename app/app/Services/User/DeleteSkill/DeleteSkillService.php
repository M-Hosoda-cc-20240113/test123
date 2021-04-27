<?php


namespace App\Services\User\DeleteSkill;


use App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface;
use App\Services\RelProjectSkill\RelProjectSkillRepositoryInterface;

class DeleteSkillService
{
    /**
     * @var RelLevelSkillUSerRepositoryInterface
     */
    private $rel_revel_skill_user_repository;

    /**
     * DeleteSkillService constructor.
     * @param \App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface $rel_revel_skill_user_repository
     */
    public function __construct(
        RelLevelSkillUSerRepositoryInterface $rel_revel_skill_user_repository,
    ) {
        $this->rel_revel_skill_user_repository = $rel_revel_skill_user_repository;
    }

    public function deleteByUserId($user_id): void
    {
        $this->rel_revel_skill_user_repository->deleteByUserId($user_id);
    }
}
