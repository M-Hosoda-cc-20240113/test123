<?php


namespace App\Services\Level\CreateLevel;


use App\Services\Level\LevelRepositoryInterface;

/**
 * Class CreateLevelService
 * @package App\Services\Level\CreateLevel
 */
class CreateLevelService
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
     * @param CreateLevelParameter $parameter
     */
    public function exec(CreateLevelParameter $parameter)
    {
        $this->level_repository->create($parameter);
    }
}
