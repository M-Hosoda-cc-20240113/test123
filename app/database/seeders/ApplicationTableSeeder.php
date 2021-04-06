<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        Application::create([
            'user_id'    => 1,
            'project_id'    => 2,
            'application_data' => $now
            'created_at' => $now
        ]);
    }
}
