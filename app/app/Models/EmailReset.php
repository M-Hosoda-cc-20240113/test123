<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EmailReset
 *
 * @property int $id
 * @property string $wanna_change_email
 * @property string $token
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmailReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailReset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailReset whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailReset whereWannaChangeEmail($value)
 * @mixin \Eloquent
 */
class EmailReset extends Model
{
    /**
     * @const string|null
     */
    const UPDATED_AT = null;

    /**
     * @const int 有効期限
     */
    const EXPIRES = 60 * 60 * 23;

    /**
     * 有効期限内か
     *
     * @return bool
     */
    public function isTokenExpired(): bool
    {
        return $this->created_at->addSeconds(self::EXPIRES)->isPast();
    }

    /**
     * @param $val
     * @return string
     */
    public function getWannaChangeEmailAttribute($val): string
    {
        return \Crypt::decrypt($val);
    }

    /**
     * @param $val
     */
    public function setWannaChangeEmailAttribute($val)
    {
        $this->attributes['wanna_change_email'] = \Crypt::encrypt($val);
    }
}
