<?php


namespace App\Services\Level\LevelList;


use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class LevelListResponse
 * @package App\Services\Level\LevelList
 */
class LevelListResponse
{
    /**
     * @var LengthAwarePaginator
     */
    private $levels;

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getLevels(): LengthAwarePaginator
    {
        return $this->levels;
    }

    /**
     * @param \Illuminate\Pagination\LengthAwarePaginator $levels
     * @return LevelListResponse
     */
    public function setLevels(LengthAwarePaginator $levels): LevelListResponse
    {
        $this->levels = $levels;
        return $this;
    }
}
