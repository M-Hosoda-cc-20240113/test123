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

        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "たなか",
            'mei'               => "太郎" ,
            'mei_kana'          => "たろう",
            'email'             => 'taro@example.com',
            'email_hash'        => bcrypt('test_taro'),
            'tel'               => '08012341234',
            'birthday'          => '19940603',
            'password'          => bcrypt('test1234'),
            'created_at'        => $now
        ]);
        User::create([
            'sei'               => "田中" ,
            'sei_kana'          => "たなか",
            'mei'               => "二郎" ,
            'mei_kana'          => "じろう",
            'email'             => 'jiro@example.com',
            'email_hash'        => bcrypt('test_jiro'),
            'tel'               => '07012341234',
            'birthday'          => '19940605',
            'password'          => bcrypt('test1234'),
            'created_at'        => $now
        ]);
    }
}
