<?php


namespace App\Services\Level\DeleteLevel;


/**
 * Class DeleteLevelParameter
 * @package App\Services\Level\DeleteLevel
 */
class DeleteLevelParameter
{
    /**
     * @var string
     */
    private $level_id;

    /**
     * @return string
     */
    public function getLevelId(): string
    {
        return $this->level_id;
    }

    /**
     * @param string $level_id
     * @return DeleteLevelParameter
     */
    public function setLevelId(string $level_id): DeleteLevelParameter
    {
        $this->level_id = $level_id;
        return $this;
    }
}
