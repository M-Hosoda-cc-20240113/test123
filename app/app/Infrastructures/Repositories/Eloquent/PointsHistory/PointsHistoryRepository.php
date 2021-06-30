<?php


namespace App\Infrastructures\Repositories\Eloquent\PointsHistory;


use App\Models\PointsHistory;
use App\Services\PointsHistory\PointsHistoryInterface;
use Carbon\Carbon;

class PointsHistoryRepository implements PointsHistoryInterface
{
    public function removeUserPoints(): void
    {
        $now_before_2years = Carbon::now()->subDays(1)->format('Y-m-d');
        $PointsHistory = PointsHistory::where('created_at','<',$now_before_2years)->get();
        foreach ($PointsHistory as $item) {
            $item->delete();
        }
    }
}
