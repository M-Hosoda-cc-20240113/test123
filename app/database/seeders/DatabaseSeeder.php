<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(AgentTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(StationTableSeeder::class);
//        $this->call(PointsHistoriesTableSeeder::class);
        $this->call(ProjectSeeder::class);
//        $this->call(RelLevelSkillUserTableSeeder::class);
//        $this->call(ApplicationTableSeeder::class);
//        $this->call(RelPositionProjectTableSeeder::class);
//        $this->call(RelProjectSkillTableSeeder::class);
//        $this->call(AssignmentTableSeeder::class);
//        $this->call(StatusTableSeeder::class);
        $this->call(NoteTableSeeder::class);
    }
}
