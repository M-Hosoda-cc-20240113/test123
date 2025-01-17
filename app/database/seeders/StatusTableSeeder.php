<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Status;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = CarbonImmutable::now();
        Status::create([
            'user_id'    => 1,
            'project_id'    => 2,
            'status' => 2,
            'created_at' => $now
        ]);

        Status::create([
            'user_id'    => 2,
            'project_id'    => 1,
            'status' => 1,
            'created_at' => $now
        ]);

        Status::create([
            'user_id'    => 4,
            'project_id'    => 10,
            'status' => 2,
            'created_at' => $now
        ]);

        Status::create([
            'user_id'    => 2,
            'project_id'    => 11,
            'created_at' => $now
        ]);

        Status::create([
            'user_id'    => 1,
            'project_id'    => 15,
            'status' => 1,
            'created_at' => $now
        ]);

        Status::create([
            'user_id'    => 3,
            'project_id'    => 6,
            'status'     => 3,
            'created_at' => $now
        ]);

        Status::create([
            'user_id'    => 4,
            'project_id'    => 13,
            'status'     => 3,
            'created_at' => $now
        ]);

        Status::create([
            'user_id'    => 5,
            'project_id'    => 13,
            'status'     => 1,
            'created_at' => $now
        ]);

        Status::create([
            'user_id'    => 6,
            'project_id'    => 3,
            'created_at' => $now
        ]);

        Status::create([
            'user_id'    => 7,
            'project_id'    => 5,
            'created_at' => $now
        ]);

        Status::create([
            'user_id'    => 8,
            'project_id'    => 7,
            'created_at' => $now
        ]);

        Status::create([
            'user_id'    => 9,
            'project_id'    => 8,
            'status'    => 3,
            'created_at' => $now
        ]);
    }
}
