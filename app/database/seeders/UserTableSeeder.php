<?php

namespace Database\Seeders;
use App\Helpers\RepositoryHelper;
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
        $email = 'kumakura0701@gmail.com';
        $email5 = 'ikenoYuri0113@gmail.com';
        $email1 = 'taro@example.com';
        $email2 = 'test@example.com';
        $email3 = 'saburo@example.com';
        $email4 = 'siro@example.com';
        $email6 = 'test1@example.com';
        $email7 = 'test2@example.com';
        $email8 = 'test3@example.com';
        $email9 = 'test4@example.com';
        $email10 = 'test5@example.com';

        $tel = '0364335957';
        $tel10 = '0364335958';
        $tel1  = '99912345678';
        $tel2  = '88812345678';
        $tel3  = '07012348097';
        $tel4  = '07012343245';
        $tel5  = '07034563245';
        $tel6  = '07123463245';
        $tel7  = '07034123445';
        $tel8  = '07034561234';
        $tel9  = '07031235432';
        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "タナカ",
            'mei'               => "太郎" ,
            'mei_kana'          => "タロウ",
            'email'             => $email1,
            'email_hash'        => hash(config('app.hash_email.algo'), $email1 . config('app.hash_email.salt')),
            'tel'               => $tel1,
            'tel_hash'               => hash(config('app.hash_email.algo'), $tel1 . config('app.hash_email.salt')),
            'birthday'          => '19940603',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'remarks'           => "特になし",
            'points'            => 0,
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "テスト" ,
            'sei_kana'          => "ユーザー",
            'mei'               => "テスト" ,
            'mei_kana'          => "ユーザー",
            'email'             => $email2,
            'email_hash'        => hash(config('app.hash_email.algo'), $email2 . config('app.hash_email.salt')),
            'tel'               => $tel2,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel2 . config('app.hash_email.salt')),
            'birthday'          => '19940605',
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'remarks'           => "特になし",
            'points'            => 0,
            'invite_code'       => RepositoryHelper::createInviteCode(),
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
            'invite_code'       => RepositoryHelper::createInviteCode(),
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
            'is_working'        => 1,
            'remarks'           => "特になし",
            'invite_code'       => RepositoryHelper::createInviteCode(),
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
            'invite_code'       => RepositoryHelper::createInviteCode(),
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
            'password'          => bcrypt('test1234'),
            'is_working'        => 0,
            'is_new'            => 0,
            'remarks'           => "特になし",
            'invite_code'       => RepositoryHelper::createInviteCode(),
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
            'invite_code'       => RepositoryHelper::createInviteCode(),
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
            'invite_code'       => RepositoryHelper::createInviteCode(),
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
            'is_working'        => 1,
            'is_new'            => 0,
            'remarks'           => "特になし",
            'invite_code'       => RepositoryHelper::createInviteCode(),
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "熊倉" ,
            'sei_kana'          => "クマクラ",
            'mei'               => "将太" ,
            'mei_kana'          => "ショウタ",
            'email'             => $email,
            'email_hash'        => hash(config('app.hash_email.algo'), $email . config('app.hash_email.salt')),
            'tel'               => $tel,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel . config('app.hash_email.salt')),
            'birthday'          => '19890402',
            'password'          => bcrypt('adminK0701'),
            'is_working'        => 0,
            'is_admin'          => 1,
            'points'            => 0,
            'invite_code'       => RepositoryHelper::createInviteCode(),
            'created_at'        => $now
        ]);

        User::create([
            'sei'               => "池野" ,
            'sei_kana'          => "イケノ",
            'mei'               => "友梨" ,
            'mei_kana'          => "ユリ",
            'email'             => $email5,
            'email_hash'        => hash(config('app.hash_email.algo'), $email5 . config('app.hash_email.salt')),
            'tel'               => $tel10,
            'tel_hash'          => hash(config('app.hash_email.algo'), $tel10 . config('app.hash_email.salt')),
            'birthday'          => '19890402',
            'password'          => bcrypt('adminY0113'),
            'is_working'        => 0,
            'is_admin'          => 1,
            'points'            => 0,
            'invite_code'       => RepositoryHelper::createInviteCode(),
            'created_at'        => $now
        ]);
    }
}
