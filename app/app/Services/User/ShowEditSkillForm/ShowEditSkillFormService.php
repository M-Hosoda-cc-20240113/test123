<?php

namespace App\Services\User\ShowEditSkillForm;

use App\Services\Level\LevelRepositoryInterface;
use App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;
use Illuminate\Support\Facades\Auth;

/**
 * Class ShowEditSkillFormService
 * @package App\Services\User\ShowEditSkillForm
 */
class ShowEditSkillFormService
{
    /**
     * @var RelLevelSkillUSerRepositoryInterface
     */
    private $rel_revel_skill_user_repository;

    /**
     * @var SkillRepositoryInterface
     */
    private $skill_repository;

    /**
     * @var LevelRepositoryInterface
     */
    private $level_repository;

    /**
     * ShowEditSkillFormService constructor.
     * @param RelLevelSkillUSerRepositoryInterface $rel_revel_skill_user_repository
     * @param SkillRepositoryInterface $skill_repository
     * @param LevelRepositoryInterface $level_repository
     */
    public function __construct(
        RelLevelSkillUSerRepositoryInterface $rel_revel_skill_user_repository,
        SkillRepositoryInterface $skill_repository,
        LevelRepositoryInterface $level_repository
    ) {
        $this->rel_revel_skill_user_repository = $rel_revel_skill_user_repository;
        $this->skill_repository = $skill_repository;
        $this->level_repository = $level_repository;
    }


    /**
     * @return ShowEditSkillFormResponse
     */
    public function exec(): ShowEditSkillFormResponse
    {
        $user_id = Auth::user()->id;
        $response = new ShowEditSkillFormResponse();

        $rel_level_skill_user = $this->rel_revel_skill_user_repository->fetchByUserId($user_id);
        $skills = $this->skill_repository->all();
        $levels = $this->level_repository->all();

        $response->setRelLevelSkillUsers($rel_level_skill_user);
        $response->setSkills($skills);
        $response->setLevels($levels);

        return $response;
    }
}
