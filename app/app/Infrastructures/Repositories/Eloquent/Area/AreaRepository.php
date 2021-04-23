<?php


namespace App\Infrastructures\Repositories\Eloquent\Area;


use App\Models\Area;
use App\Services\Area\AreaRepositoryInterface;
use Illuminate\Support\Collection;

class AreaRepository implements AreaRepositoryInterface
{
    /**
     * @inheritDoc
     * @return \App\Models\Area[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all(): Collection
    {
        return Area::all();
    }
}
