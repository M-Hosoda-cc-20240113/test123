<?php


namespace App\Services\Skill\DeleteSkill;


class DeleteSkillParameter
{
    /**
     * @var string
     */
    private $skill_id;

    /**
     * @return string
     */
    public function getSkillId(): string
    {
        return $this->skill_id;
    }

    /**
     * @param string $skill_id
     * @return DeleteSkillParameter
     */
    public function setSkillId(string $skill_id): DeleteSkillParameter
    {
        $this->skill_id = $skill_id;
        return $this;
    }
}
