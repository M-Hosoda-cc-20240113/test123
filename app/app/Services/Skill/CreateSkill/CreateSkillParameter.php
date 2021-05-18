<?php


namespace App\Services\Skill\CreateSkill;


class CreateSkillParameter
{
    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CreateSkillParameter
     */
    public function setName(string $name): CreateSkillParameter
    {
        $this->name = $name;
        return $this;
    }
}
