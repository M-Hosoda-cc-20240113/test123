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
        $project_skills8=[3,6,19];
        $project_skills9=[5,17,18];
        $project_skills10=[10,9,3,22];
        $project_skills11=[10,11,3,21,9];
        $project_skills12=[12,7,8,3,9];
        $project_skills13=[14,15,9,10];
        $project_skills14=[1,10,9];
        $project_skills15=[2,10,9,21];
        $project_skills16=[9,13,1,11];
        $project_skills17=[5,18,7,17];
        $project_skills18=[9,4];
        $project_skills19=[16,2,21];
        $project_skills20=[6,10,9,13];
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
        foreach ($project_skills4 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 4,
                'created_at' => $now
            ]);
        }
        foreach ($project_skills5 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 5,
                'created_at' => $now
            ]);
        }
        foreach ($project_skills6 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 6,
                'created_at' => $now
            ]);
        }
        foreach ($project_skills7 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 7,
                'created_at' => $now
            ]);
        }

        foreach ($project_skills8 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 8,
                'created_at' => $now
            ]);
        }
        foreach ($project_skills9 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 9,
                'created_at' => $now
            ]);
        }
        foreach ($project_skills10 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 10,
                'created_at' => $now
            ]);
        }

        foreach ($project_skills11 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 11,
                'created_at' => $now
            ]);
        }

        foreach ($project_skills12 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 12,
                'created_at' => $now
            ]);
        }

        foreach ($project_skills13 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 13,
                'created_at' => $now
            ]);
        }

        foreach ($project_skills14 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 14,
                'created_at' => $now
            ]);
        }

        foreach ($project_skills15 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 15,
                'created_at' => $now
            ]);
        }

        foreach ($project_skills16 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 16,
                'created_at' => $now
            ]);
        }

        foreach ($project_skills17 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 17,
                'created_at' => $now
            ]);
        }

        foreach ($project_skills18 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 18,
                'created_at' => $now
            ]);
        }

        foreach ($project_skills19 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 19,
                'created_at' => $now
            ]);
        }

        foreach ($project_skills20 as $value) {
            RelProjectSkill::create([
                'skill_id'    => $value,
                'project_id'    => 20,
                'created_at' => $now
            ]);
        }
    }
}
