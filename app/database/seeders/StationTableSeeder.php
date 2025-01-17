<?php

namespace Database\Seeders;

use App\Models\Station;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = [
            '蒲田' => '11',
            '大森' => '11',
            '流通センター' => '11',
            '昭和島' => '11',
            '整備場' => '11',
            '天空橋' => '11',
            '新整備場' => '11',
            '西馬込' => '11',
            '馬込' => '11',
            '平和島' => '11',
            '大森町' => '11',
            '梅屋敷' => '11',
            '京急蒲田' => '11',
            '糀谷' => '11',
            '大鳥居' => '11',
            '穴守稲荷' => '11',
            '雑色' => '11',
            '六郷土手' => '11',
            '北千束' => '11',
            '大岡山' => '11',
            '長原' => '11',
            '洗足池' => '11',
            '石川台' => '11',
            '雪が谷大塚' => '11',
            '御嶽山' => '11',
            '久が原' => '11',
            '千鳥町' => '11',
            '池上' => '11',
            '蓮沼' => '11',
            '田園調布' => '11',
            '多摩川' => '11',
            '沼部' => '11',
            '鵜の木' => '11',
            '下丸子' => '11',
            '武蔵新田' => '11',
            '矢口渡' => '11',
            '目黒' => '9',
            '五反田' => '9',
            '大崎' => '9',
            '大井町' => '9',
            '西大井' => '9',
            '品川シーサイド' => '9',
            '天王洲アイル' => '9',
            '大井競馬場前' => '9',
            '中延' => '9',
            '戸越' => '9',
            '北品川' => '9',
            '新馬場' => '9',
            '青物横丁' => '9',
            '鮫洲' => '9',
            '立会川' => '9',
            '大森海岸' => '9',
            '下神明' => '9',
            '戸越公園' => '9',
            '荏原町' => '9',
            '旗の台' => '9',
            '大崎広小路' => '9',
            '戸越銀座' => '9',
            '荏原中延' => '9',
            '不動前' => '9',
            '武蔵小山' => '9',
            '西小山' => '9',
            '品川' => '3',
            '高輪ゲートウェイ' => '3',
            '田町' => '3',
            '浜松町' => '3',
            '新橋' => '3',
            'モノレール浜松町' => '3',
            '表参道' => '3',
            '外苑前' => '3',
            '青山一丁目' => '3',
            '赤坂見附' => '3',
            '虎ノ門' => '3',
            '広尾' => '3',
            '六本木' => '3',
            '神谷町' => '3',
            '虎ノ門ヒルズ' => '3',
            '乃木坂' => '3',
            '赤坂' => '3',
            '白金台' => '3',
            '白金高輪' => '3',
            '麻布十番' => '3',
            '六本木一丁目' => '3',
            '高輪台' => '3',
            '泉岳寺' => '3',
            '三田' => '3',
            '大門' => '3',
            '芝公園' => '3',
            '御成門' => '3',
            '赤羽橋' => '3',
            '汐留' => '3',
            '竹芝' => '3',
            '日の出' => '3',
            '芝浦ふ頭' => '3',
            'お台場海浜公園' => '3',
            '台場' => '3',
            '有楽町' => '1',
            '東京' => '1',
            '神田' => '1',
            '秋葉原' => '1',
            '御茶ノ水' => '1',
            '水道橋' => '1',
            '飯田橋' => '1',
            '市ケ谷' => '1',
            '溜池山王' => '1',
            '国会議事堂前' => '1',
            '末広町' => '1',
            '霞ケ関' => '1',
            '大手町' => '1',
            '淡路町' => '1',
            '日比谷' => '1',
            '九段下' => '1',
            '竹橋' => '1',
            '二重橋前' => '1',
            '新御茶ノ水' => '1',
            '麹町' => '1',
            '永田町' => '1',
            '桜田門' => '1',
            '半蔵門' => '1',
            '神保町' => '1',
            '内幸町' => '1',
            '小川町' => '1',
            '岩本町' => '1',
            '新日本橋' => '2',
            '馬喰町' => '2',
            '八丁堀' => '2',
            '銀座' => '2',
            '京橋' => '2',
            '日本橋' => '2',
            '三越前' => '2',
            '東銀座' => '2',
            '築地' => '2',
            '茅場町' => '2',
            '人形町' => '2',
            '水天宮前' => '2',
            '小伝馬町' => '2',
            '銀座一丁目' => '2',
            '新富町' => '2',
            '月島' => '2',
            '宝町' => '2',
            '東日本橋' => '2',
            '馬喰横山' => '2',
            '浜町' => '2',
            '築地市場' => '2',
            '勝どき' => '2',
            '御徒町' => '6',
            '上野' => '6',
            '鶯谷' => '6',
            '浅草橋' => '6',
            '上野広小路' => '6',
            '稲荷町' => '6',
            '田原町' => '6',
            '浅草' => '6',
            '仲御徒町' => '6',
            '入谷' => '6',
            '三ノ輪' => '6',
            '蔵前' => '6',
            '新御徒町' => '6',
            '上野御徒町' => '6',
            '京成上野' => '6',
            '両国' => '7',
            '錦糸町' => '7',
            '押上' => '7',
            '東京スカイツリー' => '7',
            '本所吾妻橋' => '7',
            '菊川' => '7',
            '東あずま' => '7',
            '小村井' => '7',
            '曳舟' => '7',
            '東向島' => '7',
            '鐘ヶ淵' => '7',
            '京成曳舟' => '7',
            '八広' => '7',
            '亀戸' => '8',
            '越中島' => '8',
            '潮見' => '8',
            '新木場' => '8',
            '東雲' => '8',
            '国際展示場' => '8',
            '東京テレポート' => '8',
            '門前仲町' => '8',
            '木場' => '8',
            '東陽町' => '8',
            '南砂町' => '8',
            '豊洲' => '8',
            '辰巳' => '8',
            '清澄白河' => '8',
            '住吉' => '8',
            '森下' => '8',
            '西大島' => '8',
            '大島' => '8',
            '東大島' => '8',
            '亀戸水神' => '8',
            '東京国際クルーズターミナル' => '8',
            'テレコムセンター' => '8',
            '青海' => '8',
            '東京ビッグサイト' => '8',
            '有明' => '8',
            '有明テニスの森' => '8',
            '市場前' => '8',
            '新豊洲' => '8',
            '平井' => '23',
            '小岩' => '23',
            '葛西臨海公園' => '23',
            '西葛西' => '23',
            '葛西' => '23',
            '船堀' => '23',
            '一之江' => '23',
            '瑞江' => '23',
            '篠崎' => '23',
            '京成小岩' => '23',
            '江戸川' => '23',
            '新小岩' => '22',
            '亀有' => '22',
            '金町' => '22',
            '堀切菖蒲園' => '22',
            'お花茶屋' => '22',
            '青砥' => '22',
            '京成立石' => '22',
            '四ツ木' => '22',
            '京成高砂' => '22',
            '柴又' => '22',
            '京成金町' => '22',
            '新柴又' => '22',
            '北千住' => '21',
            '綾瀬' => '21',
            '北綾瀬' => '21',
            '足立小台' => '21',
            '扇大橋' => '21',
            '高野' => '21',
            '江北' => '21',
            '西新井大師西' => '21',
            '谷在家' => '21',
            '舎人公園' => '21',
            '舎人' => '21',
            '見沼代親水公園' => '21',
            '堀切' => '21',
            '牛田' => '21',
            '小菅' => '21',
            '五反野' => '21',
            '梅島' => '21',
            '西新井' => '21',
            '大師前' => '21',
            '竹ノ塚' => '21',
            '千住大橋' => '21',
            '京成関屋' => '21',
            '青井' => '21',
            '六町' => '21',
            '日暮里' => '18',
            '西日暮里' => '18',
            '三河島' => '18',
            '南千住' => '18',
            '町屋' => '18',
            '赤土小学校前' => '18',
            '熊野前' => '18',
            '三ノ輪橋' => '18',
            '荒川一中前' => '18',
            '荒川区役所前' => '18',
            '荒川二丁目' => '18',
            '荒川七丁目' => '18',
            '町屋駅前' => '18',
            '町屋二丁目' => '18',
            '東尾久三丁目' => '18',
            '宮ノ前' => '18',
            '小台' => '18',
            '荒川遊園地前' => '18',
            '荒川車庫前' => '18',
            '新三河島' => '18',
            '田端' => '17',
            '上中里' => '17',
            '王子' => '17',
            '東十条' => '17',
            '赤羽' => '17',
            '尾久' => '17',
            '十条' => '17',
            '北赤羽' => '17',
            '浮間舟渡' => '17',
            '西ケ原' => '17',
            '王子神谷' => '17',
            '志茂' => '17',
            '赤羽岩淵' => '17',
            '梶原' => '17',
            '栄町' => '17',
            '王子駅前' => '17',
            '飛鳥山' => '17',
            '滝野川一丁目' => '17',
            '西ヶ原四丁目' => '17',
            '板橋' => '19',
            '地下鉄成増' => '19',
            '新板橋' => '19',
            '板橋区役所前' => '19',
            '板橋本町' => '19',
            '本蓮沼' => '19',
            '志村坂上' => '19',
            '志村三丁目' => '19',
            '蓮根' => '19',
            '西台' => '19',
            '高島平' => '19',
            '新高島平' => '19',
            '西高島平' => '19',
            '大山' => '19',
            '中板橋' => '19',
            'ときわ台' => '19',
            '上板橋' => '19',
            '東武練馬' => '19',
            '下赤塚' => '19',
            '成増' => '19',
            '駒込' => '16',
            '巣鴨' => '16',
            '大塚' => '16',
            '池袋' => '16',
            '目白' => '16',
            '千川' => '16',
            '要町' => '16',
            '東池袋' => '16',
            '雑司が谷' => '16',
            '西巣鴨' => '16',
            '新庚申塚' => '16',
            '庚申塚' => '16',
            '巣鴨新田' => '16',
            '大塚駅前' => '16',
            '向原' => '16',
            '東池袋四丁目' => '16',
            '都電雑司ヶ谷' => '16',
            '鬼子母神前' => '16',
            '学習院下' => '16',
            '椎名町' => '16',
            '東長崎' => '16',
            '北池袋' => '16',
            '下板橋' => '16',
            '本郷三丁目' => '5',
            '後楽園' => '5',
            '茗荷谷' => '5',
            '新大塚' => '5',
            '湯島' => '5',
            '根津' => '5',
            '千駄木' => '5',
            '護国寺' => '5',
            '江戸川橋' => '5',
            '東大前' => '5',
            '本駒込' => '5',
            '春日' => '5',
            '白山' => '5',
            '千石' => '5',
            '高田馬場' => '4',
            '新大久保' => '4',
            '新宿' => '4',
            '四ツ谷' => '4',
            '信濃町' => '4',
            '大久保' => '4',
            '西新宿' => '4',
            '新宿三丁目' => '4',
            '新宿御苑前' => '4',
            '四谷三丁目' => '4',
            '落合' => '4',
            '早稲田' => '4',
            '神楽坂' => '4',
            '飯田橋(東ﾒﾄ 有楽町/南北線)' => '4',
            '市ケ谷(東ﾒﾄ)' => '4',
            '西早稲田' => '4',
            '東新宿' => '4',
            '曙橋' => '4',
            '国立競技場' => '4',
            '牛込神楽坂' => '4',
            '牛込柳町' => '4',
            '若松河田' => '4',
            '新宿西口' => '4',
            '都庁前' => '4',
            '西新宿五丁目' => '4',
            '中井' => '4',
            '落合南長崎' => '4',
            '面影橋' => '4',
            '早稲田(都電)' => '4',
            '西武新宿' => '4',
            '下落合' => '4',
            '恵比寿' => '13',
            '渋谷' => '13',
            '原宿' => '13',
            '代々木' => '13',
            '千駄ケ谷' => '13',
            '代々木上原' => '13',
            '代々木公園' => '13',
            '明治神宮前' => '13',
            '北参道' => '13',
            '新宿(都営大江戸線)' => '13',
            '代官山' => '13',
            '南新宿' => '13',
            '参宮橋' => '13',
            '代々木八幡' => '13',
            '初台' => '13',
            '幡ヶ谷' => '13',
            '笹塚' => '13',
            '神泉' => '13',
            '中目黒' => '10',
            '祐天寺' => '10',
            '学芸大学' => '10',
            '都立大学' => '10',
            '自由が丘' => '10',
            '緑が丘' => '10',
            '洗足' => '10',
            '駒場東大前' => '10',
            '九品仏' => '12',
            '尾山台' => '12',
            '等々力' => '12',
            '上野毛' => '12',
            '二子玉川' => '12',
            '用賀' => '12',
            '桜新町' => '12',
            '駒沢大学' => '12',
            '三軒茶屋' => '12',
            '池尻大橋' => '12',
            '奥沢' => '12',
            '西太子堂' => '12',
            '若林' => '12',
            '松陰神社前' => '12',
            '世田谷' => '12',
            '上町' => '12',
            '宮の坂' => '12',
            '山下' => '12',
            '松原' => '12',
            '東北沢' => '12',
            '下北沢' => '12',
            '世田谷代田' => '12',
            '梅ヶ丘' => '12',
            '豪徳寺' => '12',
            '経堂' => '12',
            '千歳船橋' => '12',
            '祖師ヶ谷大蔵' => '12',
            '成城学園前' => '12',
            '喜多見' => '12',
            '代田橋' => '12',
            '明大前' => '12',
            '下高井戸' => '12',
            '桜上水' => '12',
            '上北沢' => '12',
            '芦花公園' => '12',
            '千歳烏山' => '12',
            '池ノ上' => '12',
            '新代田' => '12',
            '東松原' => '12',
            '高円寺' => '15',
            '阿佐ケ谷' => '15',
            '荻窪' => '15',
            '西荻窪' => '15',
            '南阿佐ケ谷' => '15',
            '新高円寺' => '15',
            '東高円寺' => '15',
            '方南町' => '15',
            '八幡山' => '15',
            '永福町' => '15',
            '西永福' => '15',
            '浜田山' => '15',
            '高井戸' => '15',
            '富士見ヶ丘' => '15',
            '久我山' => '15',
            '下井草' => '15',
            '井荻' => '15',
            '上井草' => '15',
            '中野' => '14',
            '東中野' => '14',
            '新中野' => '14',
            '中野坂上' => '14',
            '中野新橋' => '14',
            '中野富士見町' => '14',
            '新江古田' => '14',
            '新井薬師前' => '14',
            '沼袋' => '14',
            '野方' => '14',
            '都立家政' => '14',
            '鷺ノ宮' => '14',
            '地下鉄赤塚' => '20',
            '平和台' => '20',
            '氷川台' => '20',
            '小竹向原' => '20',
            '練馬' => '20',
            '豊島園' => '20',
            '練馬春日町' => '20',
            '光が丘' => '20',
            '上石神井' => '20',
            '武蔵関' => '20',
            '江古田' => '20',
            '桜台' => '20',
            '新桜台' => '20',
            '中村橋' => '20',
            '富士見台' => '20',
            '練馬高野台' => '20',
            '石神井公園' => '20',
            '大泉学園' => '20',
            '吉祥寺' => '24',
            '武蔵境' => '24',
            '武蔵小金井' => '24',
            '国分寺' => '24',
            '西国分寺' => '24',
            '国立' => '24',
            '立川' => '24',
            '日野' => '24',
            '八王子' => '24',
            '町田' => '24',
            '高尾' => '24',
            '拝島' => '24',
            '青梅' => '24',
            '分倍河原' => '24',
            '北八王子' => '24',
            '府中本町' => '24',
            '府中' => '24',
            '新横浜' => '25',
            '横浜' => '25',
            '西横浜' => '25',
            '元町・中華街' => '25',
            '東神奈川' => '25',
            '神奈川' => '25',
            '白楽' => '25',
            '妙蓮寺' => '25',
            '東白楽' => '25',
            '十日市場' => '25',
            'センター南' => '25',
            'センター北' => '25',
            '菊名' => '25',
            '中田' => '25',
            'あざみ野' => '25',
            '長津田' => '25',
            '鶴見' => '25',
            '二俣川' => '25',
            '東戸塚' => '25',
            '戸塚' => '25',
            '保土ヶ谷' => '25',
            '江田' => '25',
            '瀬谷' => '25',
            '鴨居' => '25',
            '桜木町' => '25',
            '関内' => '25',
            '石川町' => '25',
            '山手' => '25',
            '根岸' => '25',
            '黄金町' => '25',
            '磯子' => '25',
            '三ツ境' => '25',
            'たまプラーザ' => '25',
            '鶴ヶ峰' => '25',
            '新杉田' => '25',
            '上大岡' => '25',
            '日吉' => '25',
            '反町' => '25',
            '馬車道' => '25',
            '伊勢崎長者町' => '25',
            'いずみ中央' => '25',
            'いずみ野' => '25',
            '金沢文庫' => '25',
            '弥生台' => '25',
            '八景島' => '25',
            'みなとみらい' => '25',
            '日本大通り' => '25',
            '希望ヶ丘' => '25',
            '日ノ出町' => '25',
            '三ツ沢上町' => '25',
            '金沢八景' => '25',
            '青葉台' => '25',
            '新子安' => '25',
            '市ヶ尾' => '25',
            '片倉町' => '25',
            '藤が丘' => '25',
            '綱島' => '25',
            '新川崎' => '26',
            '川崎' => '26',
            '川崎新町' => '26',
            '川崎大師' => '26',
            '京急川崎' => '26',
            '尻手' => '26',
            '武蔵小杉' => '26',
            '武蔵溝ノ口' => '26',
            '武蔵中原' => '26',
            '武蔵新城' => '26',
            '武蔵白石' => '26',
            '稲田堤' => '26',
            '京急稲田堤' => '26',
            '宿河原' => '26',
            '向河原' => '26',
            '久地' => '26',
            '鷺沼' => '26',
            '若葉台' => '26',
            '津田山' => '26',
            '中野島' => '26',
            '高津' => '26',
            '二子新地' => '26',
            '新百合ヶ丘' => '26',
            '百合ヶ丘' => '26',
            '向ヶ丘遊園' => '26',
            '登戸' => '26',
            '読売ランド前' => '26',
            '生田' => '26',
            '元住吉' => '26',
            '八丁畷' => '26',
            '溝ノ口' => '26',
            '本厚木' => '28',
            '愛甲石田' => '28',
            '海老名' => '29',
            '厚木' => '29',
            'かしわ台' => '29',
            'さがみ野' => '29',
            '淵野辺' => '27',
            '相模原' => '27',
            '橋本' => '27',
            '相模大野' => '27',
            '東林間' => '27',
            '藤沢' => '30',
            '大宮' => '31',
            '浦和' => '31',
            '川口' => '31',
            '千葉' => '32',
            '西船橋' => '32',
            '柏' => '32',
            '船橋' => '32',
            '海浜幕張' => '32',
            '津田沼' => '32',
            '松戸' => '32',
            '舞浜' => '32',
            '新大阪' => '33',
            '大阪' => '33',
            '梅田' => '33',
            '天王寺' => '33',
            '京橋（大阪）' => '33',
            '大阪難波' => '33',
            '名古屋' => '34',
            '栄' => '34',
            '伏見' => '34',
            '丸の内' => '34',
            '金山' => '34',
            '博多' => '35',
            '門司港' => '35',
            '小倉' => '35',
            '久留米' => '35',
            'フルリモート' =>  null,
            '春日部' => '31',
        ];
        $now = Carbon::now();
        foreach ($stations as $station => $value) {
            Station::create([
                'name' => $station,
                'area_id' => $value,
                'created_at' => $now
            ]);
        }
    }
}
