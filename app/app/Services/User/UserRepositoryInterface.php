<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\User\UpdateUser\UpdateUserParameter;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
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
     * ユーザー情報取得
     * @param int $user_id
     * @return mixed
     */
    public function fetchWithProjectsThroughApplicationOrAssignment(int $user_id);

    /**
     * @param UpdateUserParameter $parameter
     * @throws \Throwable
     */
    public function update(UpdateUserParameter $parameter): void;

    /**
     * @param string $email
     * @return User
     */
    public function findByEmail(string $email): ?User;

    /**
     * メールアドレス変更
     *
     * @param User $user
     * @param string $wanna_change_email
     */
    public function changeEmail(User $user, string $wanna_change_email);


    /**
     * @param int $user_id
     * @return void
     */
    public function delete(int $user_id): void;

    /**
     * @param \App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter $parameter
     * @return mixed
     */
    public function updateAdmin(UpdateUserAdminParameter $parameter);
}
