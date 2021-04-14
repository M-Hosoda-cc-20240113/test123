<?php

namespace Database\Seeders;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        Project::create([
            "agent_id"           => 1 ,
            "station_id"         => 1 ,
            "name"               => "CSタイトルのPS5移植案件・技術検証" ,
            "min_unit_price"     => null ,
            "max_unit_price"     => "85" ,
            "min_operation_time" => "135" ,
            "max_operation_time" => "175" ,
            "description"        => "機能検証と設計検討\r\nグラフィック最適化\r\nPF独自機能の検証/実装対応\r\nCS専用ネットワーク/ミドルウェア対応" ,
            "required_condition" => "ゲーム業界での開発実務経験5年以上\r\nUE4での開発経験必須（3年程度）\r\n未経験の技術案件でも積極的に取り組める方" ,
            "better_condition"   => "PS4向けコンシューマータイトルの開発経験\r\nPFの研究開発\r\n新規PFの研究開発" ,
            "work_start"         => "09:30" ,
            "work_end"           => "18:15" ,
            "weekly_attendance"  => "5" ,
            "feature"            => "基本リモート業務\r\n人　数：2名" ,
            "created_at"         => $now ,
        ]);

        Project::create([
            "agent_id"           => 2 ,
            "station_id"         => 2 ,
            "name"               => "【PHP】不動産会社向け契約管理システム" ,
            "min_unit_price"     =>  null,
            "max_unit_price"     => "45" ,
            "min_operation_time" => "140" ,
            "max_operation_time" => "180" ,
            "description"        => "不動産会社向け契約管理システムリプレイスを行います。" ,
            "required_condition" => "PHP経験\r\n業務系（Web）システム開発経験\r\n基本設計～の経験（3年以上）\r\n設計書等のドキュメント作成能力方" ,
            "better_condition"   => "要件定義経験\r\nスクラッチ開発経験" ,
            "work_start"         => "09:30" ,
            "work_end"           => "18:15" ,
            "weekly_attendance"  => "5" ,
            "feature"            => "外国籍不可" ,
            "created_at"         => $now
        ]);

        Project::create([
            "agent_id"           => 3 ,
            "station_id"         => 4 ,
            "name"               => "大手リラクゼーションサロン業務効率化" ,
            "min_unit_price"     => "60",
            "max_unit_price"     => "75" ,
            "min_operation_time" => "150" ,
            "max_operation_time" => "180" ,
            "description"        => "不動産会社向け契約管理システムリプレイスを行います。" ,
            "required_condition" => "アプリケーション詳細設計に相当する経験1年以上\r\nアプリケーション開発及びテストに相当する経験3年以上\r\nReactでのWebアプリケーション開発経験\r\nGithubの使用\r\nおよびプルリクエストベースのコード管理の経験があること\r\nBacklog等のチケット管理によるプロジェクト経験があること" ,
            "better_condition"   => "要件定義経験\r\nスクラッチ開発経験" ,
            "work_start"         => "09:00" ,
            "work_end"           => "19:00" ,
            "weekly_attendance"  => "5" ,
            "feature"            => "外国籍不可" ,
            "created_at"         => $now
        ]);

        Project::create([
            "agent_id"           => 5 ,
            "station_id"         => 2 ,
            "name"               => "大規模総合ＥＣサイトの開発業務全般" ,
            "min_unit_price"     => "80",
            "max_unit_price"     => "100" ,
            "min_operation_time" => "140" ,
            "max_operation_time" => "200" ,
            "description"        => "不動産会社向け契約管理システムリプレイスを行います。" ,
            "required_condition" => "上流ＳＥ：要件整理\r\n仕様調整 ＳＥ：基本設計\r\n詳細設計\r\n結合テスト\r\n統合テスト ＰＧ：詳細設計\r\n製造\r\n単体テスト\r\n結合テスト" ,
            "better_condition"   => "要件定義経験\r\nスクラッチ開発経験" ,
            "work_start"         => "09:00" ,
            "work_end"           => "17:30" ,
            "weekly_attendance"  => "5" ,
            "feature"            => "最新技術\r\nアーキテクチャーを使ったスピード感のある開発を学ぶことが可能。" ,
            "created_at"         => $now
        ]);

        Project::create([
            "agent_id"           => 4 ,
            "station_id"         => 6 ,
            "name"               => "求人ポータルサイトの運用・障害対応業務の及びAWS移管作業" ,
            "min_unit_price"     => "40",
            "max_unit_price"     => "60" ,
            "min_operation_time" => "140" ,
            "max_operation_time" => "200" ,
            "description"        => "不動産会社向け契約管理システムリプレイスを行います。" ,
            "required_condition" => "上流ＳＥ：要件整理\r\n仕様調整 ＳＥ：基本設計\r\n詳細設計\r\n結合テスト\r\n統合テスト ＰＧ：詳細設計\r\n製造\r\n単体テスト\r\n結合テスト" ,
            "better_condition"   => "要件定義経験\r\nスクラッチ開発経験" ,
            "work_start"         => "09:00" ,
            "work_end"           => "17:30" ,
            "weekly_attendance"  => "5" ,
            "feature"            => "最新技術\r\nアーキテクチャーを使ったスピード感のある開発を学ぶことが可能。" ,
            "created_at"         => $now
        ]);

        Project::create([
            "agent_id"           => 1 ,
            "station_id"         => 5 ,
            "name"               => "【大手コンビニEC 配送システム開発】" ,
            "min_unit_price"     => "60",
            "max_unit_price"     => "70" ,
            "min_operation_time" => "140" ,
            "max_operation_time" => "200" ,
            "description"        => "不動産会社向け契約管理システムリプレイスを行います。" ,
            "required_condition" => "上流ＳＥ：要件整理\r\n仕様調整 ＳＥ：基本設計\r\n詳細設計\r\n結合テスト\r\n統合テスト ＰＧ：詳細設計\r\n製造\r\n単体テスト\r\n結合テスト" ,
            "better_condition"   => "要件定義経験\r\nスクラッチ開発経験" ,
            "work_start"         => "09:00" ,
            "work_end"           => "17:30" ,
            "weekly_attendance"  => "5" ,
            "feature"            => "最新技術\r\nアーキテクチャーを使ったスピード感のある開発を学ぶことが可能。" ,
            "decided"            => 1 ,
            "created_at"         => $now
        ]);

        Project::create([
            "agent_id"           => 4 ,
            "station_id"         => 7 ,
            "name"               => "NW系ユーザー側上流業務支援" ,
            "min_unit_price"     => "80",
            "max_unit_price"     => "95" ,
            "min_operation_time" => "140" ,
            "max_operation_time" => "200" ,
            "description"        => "不動産会社向け契約管理システムリプレイスを行います。" ,
            "required_condition" => "上流ＳＥ：要件整理\r\n仕様調整 ＳＥ：基本設計\r\n詳細設計\r\n結合テスト\r\n統合テスト ＰＧ：詳細設計\r\n製造\r\n単体テスト\r\n結合テスト" ,
            "better_condition"   => "要件定義経験\r\nスクラッチ開発経験" ,
            "work_start"         => "09:00" ,
            "work_end"           => "17:30" ,
            "weekly_attendance"  => "5" ,
            "feature"            => "最新技術\r\nアーキテクチャーを使ったスピード感のある開発を学ぶことが可能。" ,
            "created_at"         => $now
        ]);
    }
}
