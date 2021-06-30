<?php

namespace App\Console\Commands;

use App\Models\PointsHistory;
use App\Models\User;
use App\Services\PointsHistory\RemovePoints\RemoveUserPointsService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RemoveUserPoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:removeUserPoints';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove Aegis points for users older than two years';

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
    public function handle(RemoveUserPointsService $remove_user_points_service )
    {
        DB::transaction(function () use ($remove_user_points_service) {
            $remove_user_points_service->exec();
        });
    }
}
