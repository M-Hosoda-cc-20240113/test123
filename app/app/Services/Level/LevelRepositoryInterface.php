<?php


namespace App\Services\Level;


use App\Models\Level;
use Illuminate\Support\Collection;

/**
 * Interface LevelRepositoryInterface
 * @package App\Services\Level
 */
interface LevelRepositoryInterface
{
    /**
     * @return Level[]|Collection
     */
    public function all():Collection;

    /**
     * @param array $level_ids
     * @return Collection
     */
    public function fetchByLevelId(array $level_ids):Collection;
}
