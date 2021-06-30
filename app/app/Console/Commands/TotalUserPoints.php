<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\AdminUser\TotalUserPoints\TotalUserPointsParameter;
use App\Services\AdminUser\TotalUserPoints\TotalUserPointsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TotalUserPoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:totalUserPoints';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Total User Points';

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
     * @return void
     * @throws \Throwable
     */
    public function handle(TotalUserPointsService $total_user_points_service)
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
