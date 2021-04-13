<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\Assignment;
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
        $now = Carbon::now();
        Assignment::create([
            'user_id'    => 1,
            'project_id'    => 2,
            'assignment_date' => $now,
            'created_at' => $now
        ]);
        Assignment::create([
            'user_id'    => 2,
            'project_id'    => 1,
            'assignment_date' => $now,
            'created_at' => $now
        ]);
    }
}
