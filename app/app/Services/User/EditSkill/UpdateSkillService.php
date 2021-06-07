<?php

namespace App\Services\User\EditSkill;

use App\Services\RelLevelSkillUser\RelLevelSkillUserRepositoryInterface;

/**
 * Class EditSkillService
 * @package App\Services\User\EditSkill
 */
class UpdateSkillService
{
    /**
     * @var RelLevelSkillUserRepositoryInterface
     */
    private $rel_revel_skill_user_repository;

    /**
     * EditSkillService constructor.
     * @param RelLevelSkillUserRepositoryInterface $rel_revel_skill_user_repository
     */
    public function __construct(RelLevelSkillUserRepositoryInterface $rel_revel_skill_user_repository)
    {
        $this->rel_revel_skill_user_repository = $rel_revel_skill_user_repository;
    }

    /**
     * @param \App\Services\User\EditSkill\UpdateSkillParameter $parameter
     */
    public function exec(UpdateSkillParameter $parameter)
    {
        $this->rel_revel_skill_user_repository->create($parameter);
    }
}
