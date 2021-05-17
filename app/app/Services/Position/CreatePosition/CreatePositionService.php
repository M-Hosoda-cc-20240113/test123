<?php


namespace App\Services\Position\CreatePosition;


use App\Services\Position\PositionRepositoryInterface;

/**
 * Class CreatePositionService
 * @package App\Services\Position\CreatePosition
 */
class CreatePositionService
{
    /**
     * @var PositionRepositoryInterface
     */
    private $position_repository;

    /**
     * CreateLevelService constructor.
     * @param PositionRepositoryInterface $position_repository
     */
    public function __construct(PositionRepositoryInterface $position_repository)
    {
        $this->position_repository = $position_repository;
    }

    /**
     * @param CreatePositionParameter $parameter
     */
    public function exec(CreatePositionParameter $parameter)
    {
        $this->position_repository->create($parameter);
    }
}
