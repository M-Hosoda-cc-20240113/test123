<?php

namespace App\Infrastructures\Repositories\Eloquent\Position;

use App\Models\Position;
use App\Services\Position\CreatePosition\CreatePositionParameter;
use App\Services\Position\DeletePosition\DeletePositionParameter;
use App\Services\Position\PositionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PositionRepository implements PositionRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return Position::all();
    }

    /**
     * @inheritDoc
     */
    public function create(CreatePositionParameter $parameter): void
    {
        $position = new Position();
        $position->name = $parameter->getName();
        $position->save();
    }

    /**
     * @inheritDoc
     */
    public function delete(DeletePositionParameter $parameter): void
    {
        $position = Position::findOrFail($parameter->getPositionId());
        $position->delete();
    }
}
