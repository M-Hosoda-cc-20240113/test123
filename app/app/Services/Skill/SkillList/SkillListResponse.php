<?php

namespace App\Services\Skill\SkillList;

use Illuminate\Pagination\LengthAwarePaginator;

class SkillListResponse
{
  /**
   * @var LengthAwarePaginator
   */
  private $skills;

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getSkills(): LengthAwarePaginator
    {
        return $this->skills;
    }

    /**
     * @param LengthAwarePaginator $skills
     * @return SkillListResponse
     */
    public function setSkills(LengthAwarePaginator $skills): SkillListResponse
    {
        $this->skills = $skills;
        return $this;
    }
}
