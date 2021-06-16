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
            'バックエンドエンジニア',
            'webデザイナー',
            'クラウドエンジニア',
            'プロジェクトリーダー',
            'プロジェクトマネージャー',
            'インフラエンジニア',
            'ネットワークエンジニア',
            'サーバーエンジニア',
            'データベースエンジニア',
            'セキュリティエンジニア',
            'プログラマー',
            'システムエンジニア',
            'その他のエンジニア',
            'セールスエンジニア',
            'テストエンジニア',
            'ブリッジSE(ブリッジエンジニア)',
            '組み込みエンジニア(エンベデッドエンジニア)',
        ];
        $now = Carbon::now();
        foreach ($names as $name) {
            Position::create([
                'name' => $name,
                'created_at' => $now
            ]);
        }
    }
}
