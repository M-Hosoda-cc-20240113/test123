<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\RelLevelSkillUser;
use Illuminate\Database\Seeder;

class RelLevelSkillUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        for ($i=1; $i < 11; $i++) { 
            RelLevelSkillUser::create([
                'user_id'    => 1,
                'skill_id'    => $i,
                'level_id' => 2,
                'created_at' => $now
            ]);
        }
        for ($i=11; $i < 20; $i++) { 
            RelLevelSkillUser::create([
                'user_id'    => 2,
                'skill_id'    => $i,
                'level_id' => 3,
                'created_at' => $now
            ]);
        }
    }
}
