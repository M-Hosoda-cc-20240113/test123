<?php


namespace App\Infrastructures\Repositories\Eloquent\Level;


use App\Models\Level;
use App\Services\Level\CreateLevel\CreateLevelParameter;
use App\Services\Level\DeleteLevel\DeleteLevelParameter;
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
        return Level::all()->sortByDesc('id');
    }

    /**
     * {@inheritDoc}
     */
    public function create(CreateLevelParameter $parameter): void
    {
        $level = new Level();
        $level->level = $parameter->getLevel();
        $level->save();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(DeleteLevelParameter $parameter): void
    {
        $level = Level::findOrFail($parameter->getLevelId());
        $level->delete();
    }
}
