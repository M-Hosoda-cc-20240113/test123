<?php

namespace Database\Seeders;

use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $notes = [
//            '追加機能のお知らせ' => 'お気に入りの案件を登録できるようになりました。',
//            'テストお知らせ２' => '特別【お友達紹介】ポイントが付与されました。',
//            'メンテナンスのお知らせ' => '6月25日深夜0:00時よりメンテナンスを行います。',
//            'テストお知らせ４' => 'テストテストテストテストテストテストテストテスト',
//            'テストお知らせ５' => 'testtesttesttesttesttesttesttesttesttest',
//            'テストお知らせ６' => 'お気に入りの案件を登録できるようになりました。',
//            'テストお知らせ７' => '特別【お友達紹介】ポイントが付与されました。',
//            'メンテナンスのお知らせ1' => '6月25日深夜0:00時よりメンテナンスを行います。',
//            'テストお知らせ８' => 'テストテストテストテストテストテストテストテスト',
//            'テストお知らせ９' => 'testtesttesttesttesttesttesttesttesttest',
//            'テストお知らせ１０' => 'お気に入りの案件を登録できるようになりました。',
//            'テストお知らせ１１' => '特別【お友達紹介】ポイントが付与されました。',
//            'メンテナンスのお知らせ2' => '6月25日深夜0:00時よりメンテナンスを行います。',
//            'テストお知らせ１２' => 'テストテストテストテストテストテストテストテスト',
//            'テストお知らせ１３' => 'testtesttesttesttesttesttesttesttesttest',
//            'テストお知らせ１４' => 'お気に入りの案件を登録できるようになりました。',
//            'テストお知らせ１５' => '特別【お友達紹介】ポイントが付与されました。',
//            'メンテナンスのお知らせ3' => '6月25日深夜0:00時よりメンテナンスを行います。',
//            'テストお知らせ１６' => 'テストテストテストテストテストテストテストテスト',
//            'テストお知らせ１７' => 'testtesttesttesttesttesttesttesttesttest',
//        ];
//        foreach ($notes as $title => $contents) {
//            Note::create([
//                'title' => $title,
//                'contents' => $contents,
//                'created_at' => Carbon::now(),
//            ]);
//        }
        Note::create([
            'title' => 'お知らせ',
            'contents' => 'こちらはAegis運営事務局からのお知らせページです。よろしくお願いいたします。',
            'created_at' => Carbon::now(),
        ]);
    }
}
