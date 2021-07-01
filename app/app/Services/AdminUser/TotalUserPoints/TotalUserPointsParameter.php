<?php


namespace App\Services\AdminUser\TotalUserPoints;


class TotalUserPointsParameter
{
    /**
     * @var int
     */
    private $user_id;


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
}
