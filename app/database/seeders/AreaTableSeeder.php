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
            '千代田区', //1
            '中央区', //2
            '港区', //3
            '新宿区', //4
            '文京区', //5
            '台東区', //6
            '墨田区', //7
            '江東区', //8
            '品川区', //9
            '目黒区', //10
            '大田区', //11
            '世田谷区', //12
            '渋谷区', //13
            '中野区', //14
            '杉並区', //15
            '豊島区', //16
            '北区', //17
            '荒川区', //18
            '板橋区', //19
            '練馬区', //20
            '足立区', //21
            '葛飾区', //22
            '江戸川区', //23
            '東京23区外', //24
            '横浜', //25
            '川崎', //26
            '相模原', //27
            '厚木', //28
            '海老名', //29
            '藤沢', //30
            '埼玉', //31
            '千葉', //32
            '大阪', //33
            '名古屋', //34
            '福岡' //35
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
