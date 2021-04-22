<?php


namespace App\Services\AdminProject\PositionSkillList;


class PositionSkillListResponse
{
    /**
     * @var
     */
    private $position_skill_list;

    /**
     * @return
     *
     */
    public function getPositionSkillList()
    {
        return $this->position_skill_list;
    }

    /**
     * @param  $position_skill_list
     */
    public function setPositionSkillList($position_skill_list)
    {
        $this->position_skill_list = $position_skill_list;
    }


}
