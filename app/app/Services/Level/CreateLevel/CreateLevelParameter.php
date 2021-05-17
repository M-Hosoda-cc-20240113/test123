<?php


namespace App\Services\Level\CreateLevel;


/**
 * Class CreateLevelParameter
 * @package App\Services\Level\CreateLevel
 */
class CreateLevelParameter
{
    /**
     * @var string
     */
    private $level;

    /**
     * @return string
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * @param string $level
     * @return CreateLevelParameter
     */
    public function setLevel(string $level): CreateLevelParameter
    {
        $this->level = $level;
        return $this;
    }
}
