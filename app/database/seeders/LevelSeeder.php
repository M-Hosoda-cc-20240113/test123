<?php

namespace Database\Seeders;
use App\Models\Level;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            '１年未満',
            '１~２年',
            '２~３年',
            '３年以上'
        ];
        $now = Carbon::now();
        foreach ($levels as $level) {
            Level::create([
                'level'       => $level,
                'created_at' => $now
            ]);  
        }
    }
}
