<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;
use Carbon\Carbon;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            '新宿区',
            '豊島区',
            '渋谷区',
            '杉並区',
            '目黒区',
            '葛飾区',
            '港区',
            '品川区',
            '千代田区',
            'その他',
            '大阪',
            '名古屋',
            '福岡'
        ];
        $now = Carbon::now();
        foreach ($areas as $area) {
            Area::create([
                'name'       => $area,
                'created_at' => $now
            ]);  
        }
    }
}
