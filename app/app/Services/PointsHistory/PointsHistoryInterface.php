<?php

namespace App\Services\PointsHistory;

interface PointsHistoryInterface
{
    public function removeUserPoints():void ;

    public function addUserPoints():void ;
}
