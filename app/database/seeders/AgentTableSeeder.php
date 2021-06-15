<?php

namespace Database\Seeders;

use App\Models\Agent;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AgentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            'はばたーく' =>  null,
            'まるっとチェンジ' =>  null,
            'アクサス' =>  null,
            'アローインフォメーション' =>  null,
            'アンリミテッドケア' =>  null,
            'ウェブスマイル' =>  null,
            'ウォンツ' =>  null,
            'エイト' =>  null,
            'エニプラ' =>  null,
            'エムフィールド' =>  null,
            'エンズ' =>  null,
            'エンタルグラフィックス' =>  null,
            'クアトロピスタス' =>  null,
            'クリエイターズギルド' =>  null,
            'コミットグロース' =>  null,
            'スキルコネクト' =>  null,
            'ステップITソリューション' =>  null,
            'スピリテック' =>  null,
            'ダイヤモンドファンタジー' =>  null,
            'テクノクライス' =>  null,
            'ノアソリューション' =>  null,
            'フォーエス' =>  null,
            'ヘルスベイシス' =>  null,
            'ベースメントファクトリープロダクション' =>  null,
            'ライズウィル' =>  null,
            'リアステージ' =>  null,
            'リレセス' =>  null,
            'リンクテック' =>  null,
            'リンクトブレイン' =>  null,
            'レナータ' =>  null,
            'レバテック' =>  null,
            'ヴィグラクリエーション' =>  null,
            '八興システムズ' =>  null,
            '日本システム開発' =>  null,
            'APパートナーズ' =>  null,
            'AZURE・PLUS' =>  null,
            'bambus' =>  null,
            'Crane&I' =>  null,
            'cuatro pistas' =>  null,
            'EVERRISE' =>  null,
            'ONE WEDGE' =>  null,
            'GIOテクノロジーズ' =>  null,
            'GROWS' =>  null,
            "honeycome" =>  null,
            'ISAplan' =>  null,
            'miraie' =>  null,
            'NDS' =>  null,
            'ON' =>  null,
            'SSC' =>  null,
            'TECHTONE' =>  null,
            'the you' =>  null,
            'UDORA' =>  null,
            'アイグローブ' =>  null,
            'アイシーズ' =>  null,
            'アイスタンダード' =>  null,
            'アクロフロンティア' =>  null,
            'アナザーウェア' =>  null,
            'アントレンド' =>  null,
            'インターノウス' =>  null,
            'インコネ' =>  null,
            'エイアイ・フィールド' =>  null,
            'オーラン' =>  null,
            'オールスマート' =>  null,
            'キャリアビート' =>  null,
            'コンテンツワン' =>  null,
            'コージーネット' =>  null,
            'コーボー' =>  null,
            'サクヤ' =>  null,
            'ジョブガレッジ' =>  null,
            'セイル' =>  null,
            'トリプルアイズ' =>  null,
            'トレンドワークス' =>  null,
            'バロックワークス' =>  null,
            'パートナー' =>  null,
            'フロンティアソリューション' =>  null,
            'ブルベース' =>  null,
            'ブレイントラスト' =>  null,
            'ペダルノート' =>  null,
            'ボーダーレスパートナーズ' =>  null,
            'ユナイテッドウィル' =>  null,
            'ルーセント・グローバル' =>  null,
            'ヴァリエイト' =>  null,
            'ヴィトーリアアルマ' =>  null,
            '富士ソフト' =>  null,
            '要' =>  null,
            'sky' =>  null,
            'アルファシステムズ' =>  null,
            'カカクコム' =>  null,
            'クリティックミッションジャパン' =>  null,
            'ソフトバンク' =>  null,
            'トーテックアメニティ' =>  ''
        ];
        $now = Carbon::now();
        foreach ($companies as $company => $number) {
            Agent::create([
                'name' => $company,
//                'tel' => $number,
//                'tel_hash' => hash(config('app.hash_email.algo'), $number . config('app.hash_email.salt')),
                'created_at' => $now,
            ]);
        }
    }
}
