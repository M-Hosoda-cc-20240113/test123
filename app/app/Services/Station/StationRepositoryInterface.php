<?php

namespace App\Services\Station;

interface StationRepositoryInterface
{
    /**
     *
     */
    public function all();

    /**
     * @param $request
     */
    public function create($request);
}
