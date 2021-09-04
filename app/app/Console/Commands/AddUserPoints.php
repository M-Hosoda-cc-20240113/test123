<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\PointsHistory\AddUserPoints\AddUserPointsService;
use App\Services\AdminUser\TotalUserPoints\TotalUserPointsParameter;
use App\Services\AdminUser\TotalUserPoints\TotalUserPointsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AddUserPoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:addUserPoints';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Aegis Points to Users Monthly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @throws \Throwable
     */
    public function handle(AddUserPointsService $add_user_points_service, TotalUserPointsService $total_user_points_service)
    {
        //ポイント履歴に5000ポイント追加
        DB::transaction(function () use ($add_user_points_service) {
            $add_user_points_service->exec();
        });

        //Usersテーブルにポイント集計
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
