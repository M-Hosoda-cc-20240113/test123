<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $email = 'taro@example.com';
        $email2 = 'jiro@example.com';
        $email3 = 'saburo@example.com';
        $email4 = 'siro@example.com';
        $email5 = 'kumakura@example.com';
        $email6 = 'test1@example.com';
        $email7 = 'test2@example.com';
        $email8 = 'test3@example.com';
        $email9 = 'test4@example.com';
        $email10 = 'test5@example.com';

        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "タナカ",
            'mei'               => "太郎" ,
            'mei_kana'          => "タロウ",
            'email'             => $email,
            'email_hash'        => hash(config('app.hash_email.algo'), $email . config('app.hash_email.salt')),
            'tel'               => '08012341234',
            'birthday'          => '19940603',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'remarks'           => "特になし",
            'operation_start_month' => 20210701,
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "タナカ",
            'mei'               => "二郎" ,
            'mei_kana'          => "ジロウ",
            'email'             => $email2,
            'email_hash'        => hash(config('app.hash_email.algo'), $email2 . config('app.hash_email.salt')),
            'tel'               => '07012347345',
            'birthday'          => '19940605',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'remarks'           => "特になし",
            'operation_start_month' => 20210901,
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "タナカ",
            'mei'               => "三郎" ,
            'mei_kana'          => "サブロウ",
            'email'             => $email3,
            'email_hash'        => hash(config('app.hash_email.algo'), $email3 . config('app.hash_email.salt')),
            'tel'               => '07012348097',
            'birthday'          => '19840905',
            'password'          => bcrypt('test1234'),
            'is_working'        => 1,
            'remarks'           => "",
            'is_new'            => 1,
            'operation_start_month' => 20211001,
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "タナカ",
            'mei'               => "四郎" ,
            'mei_kana'          => "シロウ",
            'email'             => $email4,
            'email_hash'        => hash(config('app.hash_email.algo'), $email4 . config('app.hash_email.salt')),
            'tel'               => '07012343245',
            'birthday'          => '19970116',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'remarks'           => "特になし",
            'operation_start_month' => 20211201,
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "テスト" ,
            'sei_kana'          => "テスト",
            'mei'               => "ユーザー１" ,
            'mei_kana'          => "ユーザーイチ",
            'email'             => $email6,
            'email_hash'        => hash(config('app.hash_email.algo'), $email6 . config('app.hash_email.salt')),
            'tel'               => '07034563245',
            'birthday'          => '19910216',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'is_new'            => 1,
            'remarks'           => "特になし",
            'operation_start_month' => 20211001,
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "テスト" ,
            'sei_kana'          => "テスト",
            'mei'               => "ユーザー２" ,
            'mei_kana'          => "ユーザーニ",
            'email'             => $email7,
            'email_hash'        => hash(config('app.hash_email.algo'), $email7 . config('app.hash_email.salt')),
            'tel'               => '07123463245',
            'birthday'          => '19890216',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'is_new'            => 1,
            'remarks'           => "特になし",
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "テスト" ,
            'sei_kana'          => "テスト",
            'mei'               => "ユーザー３" ,
            'mei_kana'          => "ユーザーサン",
            'email'             => $email8,
            'email_hash'        => hash(config('app.hash_email.algo'), $email8 . config('app.hash_email.salt')),
            'tel'               => '07034123445',
            'birthday'          => '19900216',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'remarks'           => "特になし",
            'operation_start_month' => 20210701,
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "テスト" ,
            'sei_kana'          => "テスト",
            'mei'               => "ユーザー４" ,
            'mei_kana'          => "ユーザーヨン",
            'email'             => $email9,
            'email_hash'        => hash(config('app.hash_email.algo'), $email9 . config('app.hash_email.salt')),
            'tel'               => '07034561234',
            'birthday'          => '19880216',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'remarks'           => "特になし",
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "テスト" ,
            'sei_kana'          => "テスト",
            'mei'               => "ユーザー５" ,
            'mei_kana'          => "ユーザーゴ",
            'email'             => $email10,
            'email_hash'        => hash(config('app.hash_email.algo'), $email10 . config('app.hash_email.salt')),
            'tel'               => '07031235432',
            'birthday'          => '19950216',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'is_new'            => 1,
            'remarks'           => "特になし",
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "熊倉" ,
            'sei_kana'          => "クマクラ",
            'mei'               => "将太" ,
            'mei_kana'          => "ショウタ",
            'email'             => $email5,
            'email_hash'        => hash(config('app.hash_email.algo'), $email5 . config('app.hash_email.salt')),
            'tel'               => '0701234867',
            'birthday'          => '19890402',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'is_admin'          => 1,
            'points'            => 0,
            'created_at'        => $now
        ]);
    }
}
