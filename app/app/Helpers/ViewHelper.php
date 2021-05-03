<?php

namespace App\Helpers;

use DateTime;
use Illuminate\Support\HtmlString;

class ViewHelper
{
    /**
     * blade用のnl2br、リンクがあればAタグを生成
     *
     * {!! nl2br(e($value)) !!} とすれば同じ処理になるのだが、
     * 誤ってエスケープ処理が抜けることやユーザー入力文字列を出力する頻度が多いこと考慮して、本メソッドを実装
     * HtmlStringを使用することで、blade中で {{ }} と記述してもbrタグはエスケープされない
     * よってblade内では {!! !!} を使わないようにする
     *
     *
     * @param string $value
     * @return HtmlString
     */
    public static function nl2brWithAnchor(string $value): HtmlString
    {
        return new HtmlString(nl2br(preg_replace('/(https?)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#\w\-\.\/\?\,\#\:\u3000-\u30FE\u4E00-\u9FA0\uFF01-\uFFE3]+)/u',
            "<a href=\\1\\2>\\1\\2</a>", htmlentities($value, ENT_QUOTES, 'UTF-8', false))));
    }

    /**
     *
     * @param string $value
     *
     * @return false|string
     * @throws Exception|\Exception
     */
    public static function timeReplace(string $value)
    {
        $date = new DateTime($value);
        return date_format($date, 'G:i');
    }

    /**
     *
     * @param string $value
     *
     * @return false|string
     * @throws Exception
     * @throws \Exception
     */
    public static function dateReplace(string $value)
    {
        $date = new DateTime($value);
        return date_format($date, 'm月d日');
    }

    /**
     * @param string|null $value
     * @return false|string
     * @throws \Exception
     */
    public static function YmdReplace(string $value = null)
    {
        if(preg_match('/^(?=.*[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}).*$/', $value)){
            $date = new DateTime($value);
            return date_format($date, 'Y/m/d');
        }
        return $value;
    }

    /**
     * @param string|null $value
     * @return false|string|null
     * @throws \Exception
     */
    public static function BirthdayReplace(string $value = null)
    {
        if(!empty($value)){
            $date = new DateTime($value);
            return date_format($date, 'Y/m/d');
        }
        return $value;
    }

    /**
     * @param string $value
     * @return string
     */
    public static function CountAge(string $value): string
    {
        $now = date("Ymd");
        $birthday = str_replace("-", "", $value);
        return floor(($now-$birthday)/10000).'歳';
    }

    public static function Status(string $value):string
    {
        $status = "";
        switch ($value) {
            case 0:
                $status = "未営業";
                break;
            case 1:
                $status = "面談待ち";
                break;
            case 2:
                $status = "結果待ち";
                break;
            case 3:
                $status = "稼働済み";
                break;
        }
        return $status;

    }
}


