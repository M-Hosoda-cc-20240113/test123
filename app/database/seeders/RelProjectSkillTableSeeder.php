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
        $php_projects=[1,3,6,7];
        $python_project=[2,3,8,16];
        $now = Carbon::now();
        foreach ($php_projects as $php) {
            RelProjectSkill::create([
                'skill_id'    => $php,
                'project_id'    => 2,
                'created_at' => $now
            ]);
        }
        foreach ($python_project as $python) {
            RelProjectSkill::create([
                'skill_id'    => $python,
                'project_id'    => 1,
                'created_at' => $now
            ]);
        }
    }
}
