<?php


namespace App\Services\AdminUser\FetchLevelSkill;


use App\Services\AdminUser\SearchUser\SearchUserParameter;
use App\Services\Level\LevelRepositoryInterface;
use App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;

/**
 * Class FetchLevelSkillService
 * @package App\Services\AdminUser\FetchLevelSkill
 */
class FetchLevelSkillService
{
    /**
     * @var SkillRepositoryInterface
     */
    private $skill_repository;

    /**
     * @var LevelRepositoryInterface
     */
    private $level_repository;

    /**
     * @var RelLevelSkillUSerRepositoryInterface
     */
    private $rel_revel_skill_user_repository;

    /**
     * FetchLevelSkillService constructor.
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     * @param \App\Services\Level\LevelRepositoryInterface $level_repository
     * @param \App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface $rel_revel_skill_user_repository
     */
    public function
    __construct(
        SkillRepositoryInterface $skill_repository,
        LevelRepositoryInterface $level_repository,
        RelLevelSkillUSerRepositoryInterface $rel_revel_skill_user_repository
    ) {
        $this->skill_repository = $skill_repository;
        $this->level_repository = $level_repository;
        $this->rel_revel_skill_user_repository = $rel_revel_skill_user_repository;
    }

    /**
     * @param SearchUserParameter|null $parameter
     * @return FetchLevelSkillResponse
     */
    public function exec(SearchUserParameter $parameter = null): FetchLevelSkillResponse
    {
        $response = new FetchLevelSkillResponse;
        $skills = $this->skill_repository->all();
        $levels = $this->level_repository->all();
        if ($parameter) {
            $rel_level_skill = $this->rel_revel_skill_user_repository->fetchByLevelIdAndSkillId($parameter->getLevelIds() ?? [], $parameter->getSkillIds() ?? []);
        }
        $response->setRelLevelSkill($rel_level_skill ?? []);
        $response->setSkills($skills);
        $response->setLevels($levels);
        return $response;
    }
}
