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
            '大久保' => 1,
            '池袋' => 2,
            '表参道' => 7,
            '渋谷' => 3,
            '品川' => 8,
            '東京' => 9,
            '京橋' => 11,
            '大田' => 10
        ];
        $now = Carbon::now();
        foreach ($stations as $station => $value) {
            Station::create([
                'name'        => $station,
                'area_id'     => $value,
                'created_at'  => $now
            ]);  
        }
    }
}
