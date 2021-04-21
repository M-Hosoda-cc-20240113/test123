<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

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
     */
    public function handle()
    {
        $AegisPoints = 5000;
        User::where('is_admin',0)->increment('points',$AegisPoints);
    }
}
