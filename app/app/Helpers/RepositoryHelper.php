<?php


namespace App\Helpers;


use Illuminate\Support\Str;

class RepositoryHelper
{
    public static function createInviteCode(int $user_id = null, int $length = 8): string
    {
        return Str::random($length) . $user_id . "_aegis";
    }
}
