<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\RelPositionProject;
use Illuminate\Database\Seeder;

class RelPositionProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        for ($i=1; $i < 4 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 1,
                'created_at' => $now
            ]);
        }
        for ($i=6; $i < 8 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 2,
                'created_at' => $now
            ]);
        }
        for ($i=1; $i < 3 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 3,
                'created_at' => $now
            ]);
        }

        for ($i=2; $i < 3 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 10,
                'created_at' => $now
            ]);
        }

        for ($i=4; $i < 5 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 11,
                'created_at' => $now
            ]);
        }

        for ($i=6; $i < 7 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 12,
                'created_at' => $now
            ]);
        }

        for ($i=2; $i < 3 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 12,
                'created_at' => $now
            ]);
        }

        for ($i=2; $i < 6 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 13,
                'created_at' => $now
            ]);
        }

        for ($i=4; $i < 7 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 14,
                'created_at' => $now
            ]);
        }

        for ($i=5; $i < 7 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 15,
                'created_at' => $now
            ]);
        }

        for ($i=2; $i < 5 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 16,
                'created_at' => $now
            ]);
        }

        for ($i=6; $i < 9 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 17,
                'created_at' => $now
            ]);
        }

        for ($i=1; $i < 5 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 18,
                'created_at' => $now
            ]);
        }

        for ($i=6; $i < 8 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 18,
                'created_at' => $now
            ]);
        }

        for ($i=1; $i < 9 ; $i++) {
            RelPositionProject::create([
                'position_id'    => $i,
                'project_id'    => 20,
                'created_at' => $now
            ]);
        }


    }
}
