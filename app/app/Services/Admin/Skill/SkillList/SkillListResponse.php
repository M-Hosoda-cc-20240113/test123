<?php

namespace App\Services\Admin\Skill\SkillList;

use App\Models\Skill;
use Illuminate\Support\Collection;

class SkillListResponse
{
  /**
   * @var Skill[]
   */
  private $skills;

  /**
   * Get the value of projects
   *
   * @return  Skill[]
   */ 
  public function getSkills()
  {
    return $this->skills;
  }

  /**
   * Set the value of projects
   *
   * @param  Skill[]  $projects
   *
   * @return  self
   */ 
  public function setSkills(Collection $skills)
  {
    $this->skills = $skills;

    return $this;
  }
}
