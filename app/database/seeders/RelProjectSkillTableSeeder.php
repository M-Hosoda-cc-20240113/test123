<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\RelProjectSkill;
use Illuminate\Database\Seeder;

class RelProjectSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_skills1=[1,6,7];
        $project_skills2=[2,8,16];
        $project_skills3=[9,10,3];
        $project_skills4=[22,3,9];
        $project_skills5=[1,2,3];
        $project_skills6=[4,5,6];
        $project_skills7=[7,8,9];
        $now = Carbon::now();
        foreach ($project_skills1 as $php) {
            RelProjectSkill::create([
                'skill_id'    => $php,
                'project_id'    => 2,
                'created_at' => $now
            ]);
        }
        foreach ($project_skills2 as $python) {
            RelProjectSkill::create([
                'skill_id'    => $python,
                'project_id'    => 1,
                'created_at' => $now
            ]);
        }
        foreach ($project_skills3 as $java) {
            RelProjectSkill::create([
                'skill_id'    => $java,
                'project_id'    => 3,
                'created_at' => $now
            ]);
        }
        foreach ($project_skills4 as $go) {
            RelProjectSkill::create([
                'skill_id'    => $go,
                'project_id'    => 4,
                'created_at' => $now
            ]);
        }
        foreach ($project_skills5 as $te) {
            RelProjectSkill::create([
                'skill_id'    => $te,
                'project_id'    => 5,
                'created_at' => $now
            ]);
        }
        foreach ($project_skills6 as $ja) {
            RelProjectSkill::create([
                'skill_id'    => $ja,
                'project_id'    => 6,
                'created_at' => $now
            ]);
        }
        foreach ($project_skills7 as $va) {
            RelProjectSkill::create([
                'skill_id'    => $va,
                'project_id'    => 7,
                'created_at' => $now
            ]);
        }
    }
}
