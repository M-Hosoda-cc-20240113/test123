<?php

namespace App\Services\Skill\SkillList;

use App\Services\Skill\SkillRepositoryInterface;

class SkillListService
{
  /**
   * @var SkillRepositoryInterface
   */
  private $skill_repository;

  public function __construct(
    SkillRepositoryInterface $skill_repository
  ) {
    $this->skill_repository = $skill_repository;
  }

  public function exec()
  {
    return $this->skill_repository->all();
  }
}
