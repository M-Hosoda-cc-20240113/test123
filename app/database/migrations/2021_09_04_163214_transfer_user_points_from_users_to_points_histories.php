<?php

use App\Models\PointsHistory;
use App\Models\User;
use App\Services\AdminUser\TotalUserPoints\TotalUserPointsParameter;
use App\Services\AdminUser\TotalUserPoints\TotalUserPointsService;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class TransferUserPointsFromUsersToPointsHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users = User::all();
        foreach ($users as $user) {
            PointsHistory::create([
                'user_id'   =>  $user->id,
                'points'    =>  $user->points,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @throws Throwable
     */
    public function down(TotalUserPointsService $total_user_points_service)
    {
        $users = User::where('is_admin', 0)
            ->select('id')
            ->get()
            ->toArray();
        foreach ($users as $user) {
            $parameter = new TotalUserPointsParameter();
            $user_id = $user['id'];
            $parameter->setUserId($user_id);
            DB::transaction(function () use ($total_user_points_service, $parameter) {
                $total_user_points_service->exec($parameter);
            });
        }
    }
}
