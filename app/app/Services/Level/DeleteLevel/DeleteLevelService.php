<?php


namespace App\Services\Level\DeleteLevel;

use App\Services\Level\DeleteLevel\DeleteLevelParameter;
use App\Services\Level\LevelRepositoryInterface;

/**
 * Class DeleteLevelService
 * @package App\Services\Level\DeleteLevel
 */
class DeleteLevelService
{
    /**
     * @var LevelRepositoryInterface
     */
    private $level_repository;

    /**
     * CreateLevelService constructor.
     * @param \App\Services\Level\LevelRepositoryInterface $level_repository
     */
    public function __construct(LevelRepositoryInterface $level_repository)
    {
        $this->level_repository = $level_repository;
    }

    /**
     * @param DeleteLevelParameter $parameter
     */
    public function exec(DeleteLevelParameter $parameter)
    {
        $this->level_repository->delete($parameter);
    }
}
