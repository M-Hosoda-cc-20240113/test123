<?php


namespace App\Infrastructures\Repositories\Eloquent\Level;


use App\Models\Level;
use App\Services\Level\LevelRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class LevelRepository
 * @package App\Infrastructures\Repositories\Eloquent\Level
 */
class LevelRepository implements LevelRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function all(): Collection
    {
        return Level::all();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByLevelId($level_ids): Collection
    {
        return Level::whereIn('id', $level_ids)
            ->get();
    }
}
