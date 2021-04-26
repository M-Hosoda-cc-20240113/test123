<?php


namespace App\Services\User\EditSkill;


use App\Models\User;

class UpdateSkillParameter
{
    /**
     * @var
     */
    private $user;

    /**
     * @var
     */
    private $skills;

    /**
     * @var
     */
    private $levels;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \App\Models\User $user
     * @return UpdateSkillParameter
     */
    public function setUser(User $user): UpdateSkillParameter
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param array $skills
     * @return UpdateSkillParameter
     */
    public function setSkills(array $skills): UpdateSkillParameter
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLevels()
    {
        return $this->levels;
    }

    /**
     * @param array $levels
     * @return UpdateSkillParameter
     */
    public function setLevels(array $levels): UpdateSkillParameter
    {
        $this->levels = $levels;
        return $this;
    }
}
