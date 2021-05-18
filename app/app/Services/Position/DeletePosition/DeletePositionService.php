<?php


namespace App\Services\Position\DeletePosition;


use App\Services\Position\PositionRepositoryInterface;

/**
 * Class DeletePositionService
 * @package App\Services\Position\DeletePosition
 */
class DeletePositionService
{
    /**
     * @var PositionRepositoryInterface
     */
    private $position_repository;

    /**
     * DeletePositionService constructor.
     * @param PositionRepositoryInterface $position_repository
     */
    public function __construct(PositionRepositoryInterface $position_repository)
    {
        $this->position_repository = $position_repository;
    }

    /**
     * @param DeletePositionParameter $parameter
     */
    public function exec(DeletePositionParameter $parameter)
    {
        $this->position_repository->delete($parameter);
    }
}
