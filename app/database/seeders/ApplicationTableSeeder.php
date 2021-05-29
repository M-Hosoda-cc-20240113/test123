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
            'operation_start_month' => 20210501,
            'interview_date' => $now->addDays(2),
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 2,
            'project_id'    => 1,
            'operation_start_month' => 20210501,
            'interview_date' => $now->addDays(3),
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 4,
            'project_id'    => 10,
            'operation_start_month' => 20211001,
            'interview_date' => $now->subDay(4),
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 2,
            'project_id'    => 11,
            'operation_start_month' => 20210601,
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 1,
            'project_id'    => 15,
            'operation_start_month' => 20210601,
            'interview_date' => $now->subDay(3),
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 5,
            'project_id'    => 13,
            'interview_date' => $now->addDays(2),
            'created_at' => $now
        ]);

        Application::create([
            'user_id'    => 6,
            'project_id'    => 3,
            'operation_start_month' => 20210701,
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
