<?php


namespace App\Services\AdminUser\TotalUserPoints;


class TotalUserPointsParameter
{
    /**
     * @var int
     */
    private $user_id;

    /**
     * @var int
     */
    private $user_points;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return TotalUserPointsParameter
     */
    public function setUserId(int $user_id): TotalUserPointsParameter
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserPoints(): int
    {
        return $this->user_points;
    }

    /**
     * @param int $user_points
     * @return TotalUserPointsParameter
     */
    public function setUserPoints(int $user_points): TotalUserPointsParameter
    {
        $this->user_points = $user_points;
        return $this;
    }
}
