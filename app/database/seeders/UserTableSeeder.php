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

        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "タナカ",
            'mei'               => "太郎" ,
            'mei_kana'          => "たろう",
            'email'             => $email,
            'email_hash'        => hash(config('app.hash_email.algo'), $email . config('app.hash_email.salt')),
            'tel'               => '08012341234',
            'birthday'          => '19940603',
            'password'          => bcrypt('test1234'),
            'is_working'        => 1,
            'created_at'        => $now
        ]);
        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "タナカ",
            'mei'               => "二郎" ,
            'mei_kana'          => "じろう",
            'email'             => $email2,
            'email_hash'        => hash(config('app.hash_email.algo'), $email2 . config('app.hash_email.salt')),
            'tel'               => '07012341234',
            'birthday'          => '19940605',
            'password'          => bcrypt('test1234'),
            'is_working'        => 1,
            'created_at'        => $now
        ]);
    }
}
