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

        $tel1  = '08012341234';
        $tel2  = '07012347345';
        $tel3  = '07012348097';
        $tel4  = '07012343245';
        $tel5  = '07034563245';
        $tel6  = '07123463245';
        $tel7  = '07034123445';
        $tel8  = '07034561234';
        $tel9  = '07031235432';
        $tel10 = '07012348674';

        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "タナカ",
            'mei'               => "太郎" ,
            'mei_kana'          => "タロウ",
            'email'             => $email,
            'email_hash'        => hash(config('app.hash_email.algo'), $email . config('app.hash_email.salt')),
            'tel'               => $tel1,
            'tel_hash'               => hash(config('app.hash_email.algo'), $tel1 . config('app.hash_email.salt')),
            'birthday'          => '19940603',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'remarks'           => "特になし",
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "タナカ",
            'mei'               => "二郎" ,
            'mei_kana'          => "ジロウ",
            'email'             => $email2,
            'email_hash'        => hash(config('app.hash_email.algo'), $email2 . config('app.hash_email.salt')),
            'tel'               => $tel2,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel2 . config('app.hash_email.salt')),
            'birthday'          => '19940605',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'remarks'           => "特になし",
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "タナカ",
            'mei'               => "三郎" ,
            'mei_kana'          => "サブロウ",
            'email'             => $email3,
            'email_hash'        => hash(config('app.hash_email.algo'), $email3 . config('app.hash_email.salt')),
            'tel'               => $tel3,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel3 . config('app.hash_email.salt')),
            'birthday'          => '19840905',
            'password'          => bcrypt('test1234'),
            'is_working'        => 1,
            'remarks'           => "",
            'is_new'            => 0,
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "タナカ",
            'mei'               => "四郎" ,
            'mei_kana'          => "シロウ",
            'email'             => $email4,
            'email_hash'        => hash(config('app.hash_email.algo'), $email4 . config('app.hash_email.salt')),
            'tel'               => $tel4,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel4 . config('app.hash_email.salt')),
            'birthday'          => '19970116',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'remarks'           => "特になし",
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "テスト" ,
            'sei_kana'          => "テスト",
            'mei'               => "ユーザー１" ,
            'mei_kana'          => "ユーザーイチ",
            'email'             => $email6,
            'email_hash'        => hash(config('app.hash_email.algo'), $email6 . config('app.hash_email.salt')),
            'tel'               => $tel5,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel5 . config('app.hash_email.salt')),
            'birthday'          => '19910216',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'is_new'            => 0,
            'remarks'           => "特になし",
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "テスト" ,
            'sei_kana'          => "テスト",
            'mei'               => "ユーザー２" ,
            'mei_kana'          => "ユーザーニ",
            'email'             => $email7,
            'email_hash'        => hash(config('app.hash_email.algo'), $email7 . config('app.hash_email.salt')),
            'tel'               => $tel6,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel6 . config('app.hash_email.salt')),
            'birthday'          => '19890216',
            'tel_hash'          => hash(config('app.hash_email.algo'), $email . config('app.hash_email.salt')),
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'is_new'            => 0,
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
            'tel'               => $tel7,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel7 . config('app.hash_email.salt')),
            'birthday'          => '19900216',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'remarks'           => "特になし",
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "テスト" ,
            'sei_kana'          => "テスト",
            'mei'               => "ユーザー４" ,
            'mei_kana'          => "ユーザーヨン",
            'email'             => $email9,
            'email_hash'        => hash(config('app.hash_email.algo'), $email9 . config('app.hash_email.salt')),
            'tel'               => $tel8,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel8 . config('app.hash_email.salt')),
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
            'tel'               => $tel9,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel9 . config('app.hash_email.salt')),
            'birthday'          => '19950216',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'is_new'            => 0,
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
            'tel'               => $tel10,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel10 . config('app.hash_email.salt')),
            'birthday'          => '19890402',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'is_admin'          => 1,
            'points'            => 0,
            'created_at'        => $now
        ]);
    }
}
