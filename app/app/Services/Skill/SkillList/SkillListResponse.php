<?php

namespace App\Services\Skill\SkillList;

use App\Models\Skill;
use Illuminate\Support\Collection;

class SkillListResponse
{
  /**
   * @var Skill[]
   */
  private $skills;

    /**
     * @return \App\Models\Skill[]
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /**
     * @param \App\Models\Skill[] $skills
     */
    public function setSkills(array $skills): SkillListResponse
    {
        $this->skills = $skills;
        return $this;
    }
}
