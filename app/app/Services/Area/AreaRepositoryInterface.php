<?php


namespace App\Services\Area;


use Illuminate\Support\Collection;

interface AreaRepositoryInterface
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection;
}
