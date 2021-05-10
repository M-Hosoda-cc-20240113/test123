<?php


namespace App\Services\AdminUser\SearchUser;


use App\Services\Level\LevelRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;

/**
 * Class SearchUserFetchLevelSKillService
 * @package App\Services\AdminUser\SearchUser
 */
class SearchUserFetchLevelSkillService
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
     * @param SearchUserParameter $parameter
     * @return SearchUserFetchLevelSkillResponse
     */
    public function exec(SearchUserParameter $parameter): SearchUserFetchLevelSkillResponse
    {
        $response = new SearchUserFetchLevelSkillResponse;
        $skills = $this->skill_repository->all();
        $levels = $this->level_repository->all();
        $response->setSkills($skills);
        $response->setLevels($levels);
        $response->setSearchedLevelIds($parameter->getLevelIds());
        $response->setSearchedSkillIds($parameter->getSkillIds());
        $response->setSearchedNewUser($parameter->getNewUser());
        $response->setSearchedNotNewUser($parameter->getNotNewUser());
        $response->setSearchedIsWorking($parameter->getIsWorking());
        $response->setSearchedIsNotWorking($parameter->getIsNotWorking());
        $response->setSearchedOperationStartMonth($parameter->getOperationStartMonth());
        return $response;
    }
}
