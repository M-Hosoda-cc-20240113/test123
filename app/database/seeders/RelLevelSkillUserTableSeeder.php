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
        for ($i=1; $i < 6; $i++) {
            RelLevelSkillUser::create([
                'user_id'    => 1,
                'skill_id'    => $i,
                'level_id' => 2,
                'created_at' => $now
            ]);
        }
        for ($i=6; $i < 11; $i++) {
            RelLevelSkillUser::create([
                'user_id'    => 2,
                'skill_id'    => $i,
                'level_id' => 3,
                'created_at' => $now
            ]);
        }
        for ($i=11; $i < 15; $i++) {
            RelLevelSkillUser::create([
                'user_id'    => 3,
                'skill_id'    => $i,
                'level_id' => 1,
                'created_at' => $now
            ]);
        }
        for ($i=15; $i < 19; $i++) {
            RelLevelSkillUser::create([
                'user_id'    => 4,
                'skill_id'    => $i,
                'level_id' => 2,
                'created_at' => $now
            ]);
        }

        for ($i=2; $i < 5; $i++) {
            RelLevelSkillUser::create([
                'user_id'    => 5,
                'skill_id'    => $i,
                'level_id' => 1,
                'created_at' => $now
            ]);
        }

        for ($i=3; $i < 8; $i++) {
            RelLevelSkillUser::create([
                'user_id'    => 6,
                'skill_id'    => $i,
                'level_id' => 3,
                'created_at' => $now
            ]);
        }

        for ($i=7; $i < 9; $i++) {
            RelLevelSkillUser::create([
                'user_id'    => 7,
                'skill_id'    => $i,
                'level_id' => 2,
                'created_at' => $now
            ]);
        }

        for ($i=1; $i < 3; $i++) {
            RelLevelSkillUser::create([
                'user_id'    => 8,
                'skill_id'    => $i,
                'level_id' => 1,
                'created_at' => $now
            ]);
        }

        for ($i=13; $i < 17; $i++) {
            RelLevelSkillUser::create([
                'user_id'    => 9,
                'skill_id'    => $i,
                'level_id' => 2,
                'created_at' => $now
            ]);
        }

    }
}
