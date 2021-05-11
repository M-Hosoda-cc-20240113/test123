<?php


namespace App\Services\AdminUser\SearchUser;


use App\Services\Level\LevelRepositoryInterface;
use App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface;
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
     * @var RelLevelSkillUSerRepositoryInterface
     */
    private $rel_revel_skill_user_repository;

    /**
     * SearchUserFetchLevelSkillService constructor.
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
     * @param SearchUserParameter $parameter
     * @return SearchUserFetchLevelSkillResponse
     */
    public function exec(SearchUserParameter $parameter): SearchUserFetchLevelSkillResponse
    {
        $response = new SearchUserFetchLevelSkillResponse;
        $skills = $this->skill_repository->all();
        $levels = $this->level_repository->all();
        $rel_level_skill = $this->rel_revel_skill_user_repository->fetchByLevelIdAndSkillId($parameter->getLevelIds(),$parameter->getSkillIds());
//        $searched_skill = $this->skill_repository->fetchBySkillId($parameter->getLevelIds());
//        $searched_level = $this->level_repository->fetchByLevelId($parameter->getSkillIds());
        $response->setSkills($skills);
        $response->setLevels($levels);
        dd($rel_level_skill);
        $response->setRelLevelSkill($rel_level_skill);
//        $response->setSearchedLevels($searched_skill);
//        $response->setSearchedSkills($searched_level);
        return $response;
    }
}
