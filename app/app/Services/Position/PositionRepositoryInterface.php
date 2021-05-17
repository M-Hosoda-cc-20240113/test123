<?php

namespace App\Services\Position;

use App\Services\Position\CreatePosition\CreatePositionParameter;
use App\Services\Position\DeletePosition\DeletePositionParameter;
use Illuminate\Database\Eloquent\Collection;

interface PositionRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all();


    /**
     * @param CreatePositionParameter $parameter
     */
    public function create(CreatePositionParameter $parameter): void;

    /**
     * @param DeletePositionParameter $parameter
     */
    public function delete(DeletePositionParameter $parameter): void;
}
