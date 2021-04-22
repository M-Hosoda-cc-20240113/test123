<?php


namespace App\Infrastructures\Repositories\Eloquent\Area;


use App\Models\Area;
use App\Services\Area\AreaRepositoryInterface;

class AreaRepository implements AreaRepositoryInterface
{
    public function all()
    {
        return Area::all();
    }
}
