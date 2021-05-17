<?php


namespace App\Services\Skill\CreateSkill;


use App\Services\Skill\SkillRepositoryInterface;

/**
 * Class CreateSkillService
 * @package App\Services\Skill\CreateSkill
 */
class CreateSkillService
{
    /**
     * @var SkillRepositoryInterface
     */
    private $skill_repository;

    /**
     * CreateSkillService constructor.
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     */
    public function __construct(SkillRepositoryInterface $skill_repository)
    {
        $this->skill_repository = $skill_repository;
    }

    /**
     * @param CreateSkillParameter $parameter
     */
    public function exec(CreateSkillParameter $parameter)
    {
        $this->skill_repository->create($parameter);
    }
}
