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
//            'フロントエンドエンジニア',
//            'サーバーサイドエンジニア',
//            'スマホアプリ開発（ネイティブ）エンジニア',
//            'アナリスト（データサイエンティスト）',
//            'サーバーエンジニア',
//            '企画・マーケティング',
//            'Webディレクター・プロデューサー',
            'システムエンジニア',
            'システムエンジニアからの発展系',
            'プロジェクトマネージャー',
            'プロジェクトリーダー',
            'ブリッジSE(ブリッジエンジニア)',
            '開発エンジニア',
            'プログラマー',
            'フロントエンドエンジニア',
            '組み込みエンジニア(エンベデッドエンジニア)',
            'インフラエンジニア',
            'ネットワークエンジニア',
            'サーバーエンジニア',
            'データベースエンジニア',
            'セキュリティエンジニア',
            'クラウドエンジニア',
            'バックエンドエンジニア',
            'その他のエンジニア',
            'セールスエンジニア',
            'webデザイナー',
            'マークアップエンジニア',
            'テストエンジニア',
            'フィールドエンジニア(サービスエンジニア)'
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
