<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

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
     */
    public function handle()
    {
        $now_before_2years = Carbon::now()->subYears(2)->format('Y-m-d');
        $AegisPoints = 5000;
        User::where('is_admin', 0)
            ->where('created_at', '<', $now_before_2years)
            ->decrement('points', $AegisPoints);
    }
}
