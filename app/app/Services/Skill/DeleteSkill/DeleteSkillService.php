<?php


namespace App\Services\Skill\DeleteSkill;


use App\Services\Skill\CreateSkill\CreateSkillParameter;
use App\Services\Skill\SkillRepositoryInterface;

class DeleteSkillService
{
    /**
     * @var SkillRepositoryInterface
     */
    private $skill_repository;

    /**
     * DeleteSkillService constructor.
     * @param SkillRepositoryInterface $skill_repository
     */
    public function __construct(SkillRepositoryInterface $skill_repository)
    {
        $this->skill_repository = $skill_repository;
    }

    /**
     * @param DeleteSkillParameter $parameter
     */
    public function exec(DeleteSkillParameter $parameter)
    {
        $this->skill_repository->delete($parameter);
    }

}
