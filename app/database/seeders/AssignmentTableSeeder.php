<?php

namespace Database\Seeders;

use App\Models\Assignment;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;

class AssignmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = CarbonImmutable::now();
        Assignment::create([
            'user_id' => 3,
            'project_id' => 6,
            'assignment_start_date' => $now->addMonth(2),
            'created_at' => $now
        ]);

        Assignment::create([
            'user_id' => 4,
            'project_id' => 13,
            'assignment_start_date' => $now->addMonth(3),
            'created_at' => $now
        ]);

        Assignment::create([
            'user_id'    => 9,
            'project_id'    => 8,
            'assignment_start_date' => $now->addMonth(1),
            'created_at' => $now
        ]);
    }
}
