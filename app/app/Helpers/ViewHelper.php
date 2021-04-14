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
     * よって、blade内では {!! !!} を使わないようにする
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
     * @throws Exception
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
     */
    public static function dateReplace(string $value)
    {
        $date = new DateTime($value);
        return date_format($date, 'm月d日');
    }
}


