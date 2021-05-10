<?php


namespace App\Services\AdminUser\FetchLevelSkill;


use App\Services\AdminUser\SearchUser\SearchUserParameter;
use App\Services\Level\LevelRepositoryInterface;
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
     * FetchLevelSkillService constructor.
     * @param SkillRepositoryInterface $skill_repository
     * @param LevelRepositoryInterface $level_repository
     */
    public function __construct(
        SkillRepositoryInterface $skill_repository,
        LevelRepositoryInterface $level_repository)
    {
        $this->skill_repository = $skill_repository;
        $this->level_repository = $level_repository;
    }

    /**
     * @return FetchLevelSkillResponse
     */
    public function exec(): FetchLevelSkillResponse
    {
        $response = new FetchLevelSkillResponse;
        $skills = $this->skill_repository->all();
        $levels = $this->level_repository->all();
        $response->setSkills($skills);
        $response->setLevels($levels);
        return $response;
    }
}
