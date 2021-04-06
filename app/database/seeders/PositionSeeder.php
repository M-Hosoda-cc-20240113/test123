<?php

namespace Database\Seeders;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'フロントエンドエンジニア',
            'サーバーサイドエンジニア',
            'スマホアプリ開発（ネイティブ）エンジニア',
            'アナリスト（データサイエンティスト）',
            'サーバーサイド',
            '企画・マーケティング',
            'Webディレクター・プロデューサー',
            'UI・UXデザイナー'
        ];
        $now = Carbon::now();
        foreach ($names as $name) {
            Position::create([
                'name'       => $name,
                'created_at' => $now
            ]);  
        }
    }
}
