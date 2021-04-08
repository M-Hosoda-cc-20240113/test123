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
            'agent_id'           => 1 ,
            'station_id'         => 1 ,
            'name'               => "CSタイトルのPS5移植案件・技術検証" ,
            'min_unit_price'     => null ,
            'max_unit_price'     => "850000" ,
            'min_operation_time' => '135' ,
            'max_operation_time' => '175' ,
            'description'        => '機能検証と設計検討、グラフィック最適化、PF独自機能の検証/実装対応、CS専用ネットワーク/ミドルウェア対応' ,
            'required_condition' => 'ゲーム業界での開発実務経験5年以上、UE4での開発経験必須（3年程度）、未経験の技術案件でも積極的に取り組める方' ,
            'better_condition'   => 'PS4向けコンシューマータイトルの開発経験、PFの研究開発、新規PFの研究開発' ,
            'work_start'         => '09:30' ,
            'work_end'           => '18:15' ,
            'weekly_attendance'  => '5' ,
            'feature'            => '基本リモート業務、人　数：2名' ,
            'created_at'         => $now ,
        ]);

        Project::create([
            'agent_id'           => 2 ,
            'station_id'         => 2 ,
            'name'               => "【PHP】不動産会社向け契約管理システム" ,
            'min_unit_price'     =>  null,
            'max_unit_price'     => "450000" ,
            'min_operation_time' => "140" ,
            'max_operation_time' => '180' ,
            'description'        => '不動産会社向け契約管理システムリプレイスを行います。' ,
            'required_condition' => 'PHP経験、業務系（Web）システム開発経験、基本設計～の経験（3年以上）、設計書等のドキュメント作成能力方' ,
            'better_condition'   => '要件定義経験、スクラッチ開発経験' ,
            'work_start'         => '09:30' ,
            'work_end'           => '18:15' ,
            'weekly_attendance'  => '5' ,
            'feature'            => '外国籍不可' ,
            'created_at'         => $now 
        ]);
    }
}
