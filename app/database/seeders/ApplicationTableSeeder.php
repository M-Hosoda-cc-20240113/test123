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
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 2,
            'project_id'    => 1,
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 4,
            'project_id'    => 10,
            'created_at' => $now
        ]);

        Application::create([
        'user_id'    => 2,
        'project_id'    => 11,
        'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 1,
            'project_id'    => 15,
            'created_at' => $now
        ]);
    }
}
