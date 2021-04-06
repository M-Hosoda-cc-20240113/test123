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
    
        $skills_first = [1,2,3,4,5,6,7,8,9,10];
        $skills_second = [11,12,13,14,15,16,17,18,19];
        $now = Carbon::now();
        foreach ($skills_first as $skill) {
            RelLevelSkillUser::create([
                'user_id'    => 1,
                'skill_id'    => $skill,
                'level_id' => 2,
                'created_at' => $now
            ]);
        }
        foreach ($skills_second as $skill) {
            RelLevelSkillUser::create([
                'user_id'    => 2,
                'skill_id'    => $skill,
                'level_id' => 3,
                'created_at' => $now
            ]);
        }
    }
}
