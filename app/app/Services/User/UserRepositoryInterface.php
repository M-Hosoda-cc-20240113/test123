<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserRepositoryInterface
 * @package App\Services\User
 */
interface UserRepositoryInterface
{
    /**
     * @return Collection|User[]
     */
    public function all(): Collection;

    /**
     * メールアドレスのhashを生成
     *
     * @param string $email
     * @return string
     */
    public static function makeEmailHash(string $email): string;

    /**
     * メールアドレスのハッシュからユーザーを取得
     *
     * @param string $email_hash
     * @return User
     */
    public function findByEmailHash(string $email_hash): User;

    /**
     * @param int $user_id
     * @return mixed
     */
    public function detail(int $user_id);
}
