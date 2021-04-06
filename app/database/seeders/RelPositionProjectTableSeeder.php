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

    }
}
