<?php


namespace App\Services\User\EditSkill;


use App\Models\User;

class UpdateSkillParameter
{
    /**
     * @var int
     */
    private $user_id;

    /**
     * @var int[]|array
     */
    private $skill_ids;

    /**
     * @var int[]|array
     */
    private $level_ids;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return UpdateSkillParameter
     */
    public function setUserId(int $user_id): UpdateSkillParameter
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return array
     */
    public function getSkillids(): array
    {
        return $this->skill_ids;
    }

    /**
     * @param array|null $skill_ids
     * @return UpdateSkillParameter
     */
    public function setSkillids(?array $skill_ids): UpdateSkillParameter
    {
        $this->skill_ids = $skill_ids;
        return $this;
    }

    /**
     * @return array|int[]
     */
    public function getLevelids(): array
    {
        return $this->level_ids;
    }

    /**
     * @param array|null $level_ids
     * @return UpdateSkillParameter
     */
    public function setLevelids(?array $level_ids): UpdateSkillParameter
    {
        $this->level_ids = $level_ids;
        return $this;
    }
}
