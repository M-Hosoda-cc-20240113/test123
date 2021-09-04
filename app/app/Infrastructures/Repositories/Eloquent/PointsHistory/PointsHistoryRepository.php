<?php


namespace App\Infrastructures\Repositories\Eloquent\PointsHistory;


use App\Models\PointsHistory;
use App\Models\User;
use App\Services\PointsHistory\PointsHistoryInterface;
use Carbon\Carbon;

class PointsHistoryRepository implements PointsHistoryInterface
{
    public function removeUserPoints(): void
    {
        $now_before_2years = Carbon::now()->subYears(2)->format('Y-m-d');
        $point_history = PointsHistory::where('created_at','<',$now_before_2years)->get();
        foreach ($point_history as $item) {
            $item->delete();
        }
    }

    public function addUserPoints(): void
    {
        $users = User::where('is_admin', 0)->get();
        foreach ($users as $user) {
            PointsHistory::create([
                'user_id'   =>  $user->id,
                'points'    =>  5000,
            ]);
        }
    }
}
