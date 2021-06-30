<?php


namespace App\Services\PointsHistory\RemovePoints;


use App\Services\PointsHistory\PointsHistoryInterface;

class RemoveUserPointsService
{
    /**
     * @var PointsHistoryInterface
     */
    private $points_history_repository;

    /**
     * RemoveUserPointsService constructor.
     * @param \App\Services\PointsHistory\PointsHistoryInterface $points_history_repository
     */
    public function __construct(PointsHistoryInterface $points_history_repository)
    {
        $this->points_history_repository = $points_history_repository;
    }

    public function exec()
    {
        $this->points_history_repository->removeUserPoints();
    }
}
