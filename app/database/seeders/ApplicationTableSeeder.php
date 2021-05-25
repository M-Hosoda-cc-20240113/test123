<?php

namespace Database\Seeders;

use App\Models\Application;
use Carbon\CarbonImmutable;
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
        $now = CarbonImmutable::now();
        Application::create([
            'user_id'    => 1,
            'project_id'    => 2,
            'interview_date' => $now->addDays(15),
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 2,
            'project_id'    => 1,
            'interview_date' => $now->addDays(13),
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 4,
            'project_id'    => 10,
            'interview_date' => $now->addDays(16),
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

        Application::create([
            'user_id'    => 5,
            'project_id'    => 13,
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 6,
            'project_id'    => 3,
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 7,
            'project_id'    => 5,
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 8,
            'project_id'    => 7,
            'created_at' => $now
        ]);
    }
}
