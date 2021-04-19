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
            'user_id'    => 3,
            'project_id'    => 6,
            'created_at' => $now
        ]);
    }
}
