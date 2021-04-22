<?php


namespace App\Services\AdminProject\PositionSkillList;


use App\Services\Position\PositionRepositoryInterface;
use App\Services\Skill\SkillRepositoryInterface;

class PositionSkillListService
{
    /**
     * @var
     */
    private $position_repository;
    /**
     * @var
     */
    private $skill_repository;

    /**
     * PositionSkillListService constructor.
     * @param \App\Services\Position\PositionRepositoryInterface $position_repository
     * @param \App\Services\Skill\SkillRepositoryInterface $skill_repository
     */
    public function __construct(PositionRepositoryInterface $position_repository, SkillRepositoryInterface $skill_repository)
    {
        $this->position_repository = $position_repository;
        $this->skill_repository = $skill_repository;
    }

    public function exec()
    {

    }

}
