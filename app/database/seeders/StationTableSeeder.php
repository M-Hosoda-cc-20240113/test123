<?php

namespace Database\Seeders;

use App\Models\Station;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = [
            '大久保',
            '池袋',
            '表参道',
            '渋谷',
            '品川',
            '東京',
            '京橋',
            '大田'
        ];
        $now = Carbon::now();
        foreach ($stations as $station) {
            Station::create([
                'name'       => $station,
                'created_at' => $now
            ]);  
        }
    }
}
