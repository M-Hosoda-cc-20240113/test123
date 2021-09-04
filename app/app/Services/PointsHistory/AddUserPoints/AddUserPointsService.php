<?php

namespace App\Services\PointsHistory\AddUserPoints;

use App\Services\PointsHistory\PointsHistoryInterface;

class AddUserPointsService
{
    /**
     * @var PointsHistoryInterface
     */
    private $points_history_repository;


    /**
     * @param PointsHistoryInterface $points_history_repository
     */
    public function __construct(PointsHistoryInterface $points_history_repository)
    {
        $this->points_history_repository = $points_history_repository;
    }

    /**
     */
    public function exec()
    {
        $this->points_history_repository->addUserPoints();
    }
}
