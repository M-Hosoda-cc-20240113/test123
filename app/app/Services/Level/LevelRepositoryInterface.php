<?php


namespace App\Services\Level;

use App\Services\Level\CreateLevel\CreateLevelParameter;
use App\Services\Level\DeleteLevel\DeleteLevelParameter;
use Illuminate\Support\Collection;

/**
 * Interface LevelRepositoryInterface
 * @package App\Services\Level
 */
interface LevelRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all():Collection;

    /**
     * @param CreateLevelParameter $parameter
     * @return void
     */
    public function create(CreateLevelParameter $parameter):void;

    /**
     * @param DeleteLevelParameter $parameter
     * @return void
     */
    public function delete(DeleteLevelParameter $parameter):void;
}
