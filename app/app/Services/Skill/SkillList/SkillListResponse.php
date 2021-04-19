<?php

namespace App\Services\Skill\SkillList;

use App\Models\Skill;
use Illuminate\Support\Collection;

class StationListResponse
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
    public function setSkills(array $skills): void
    {
        $this->skills = $skills;
    }
}
