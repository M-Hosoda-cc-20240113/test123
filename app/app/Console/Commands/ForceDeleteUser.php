<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ForceDeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:forceDeleteUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'force delete soft delete users';

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
     */
    public function handle(): void
    {
        $now = Carbon::now();
        User::onlyTrashed()->where('deleted_at','<',$now->subMonth())->forceDelete();
    }
}
