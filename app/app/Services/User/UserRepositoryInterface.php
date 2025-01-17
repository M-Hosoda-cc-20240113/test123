<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\AdminUser\TotalUserPoints\TotalUserPointsParameter;
use App\Services\User\RegisterUser\RegisterUserParameter;
use App\Services\User\UpdateUser\UpdateUserParameter;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

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
     * 電話番号のhashを生成
     *
     * @param string $tel
     * @return string
     */
    public function makeTelHash(string $tel): string;

    /**
     * メールアドレスのハッシュからユーザーを取得
     *
     * @param string $email_hash
     * @return User
     */
    public function findByEmailHash(string $email_hash): User;

    /**
     * @param string $email
     * @return User
     */
    public function findByEmail(string $email): ?User;


    /**
     * 電話番号からユーザーを取得
     */
    public function findByTel(string $tel): ?User;

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
     * @param RegisterUserParameter $parameter
     * @return User
     */
    public function register(RegisterUserParameter $parameter): User;

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

    /**
     * @param array $skill_ids
     * @param array $searched_ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchBySkillIds(array $skill_ids, array $searched_ids = []): Collection;

    /**
     * @param array $level_ids
     * @param array $searched_ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchByLevelIds(array $level_ids, array $searched_ids = []): Collection;

    /**
     * @param array $searched_ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchByNewUser(array $searched_ids = []): Collection;

    /**
     * @param array $searched_ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchByNotNewUser(array $searched_ids = []): Collection;

    /**
     * @param array $searched_ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchByIsWorking(array $searched_ids = []): Collection;

    /**
     * @param array $searched_ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function fetchByIsNotWorking(array $searched_ids = []): Collection;

    /**
     * @param string $operation_start_month
     * @param array $searched_ids
     * @return \Illuminate\Support\Collection
     */
    public function fetchByOperationStartMonth(string $operation_start_month, array $searched_ids = []): SupportCollection;

    /**
     * @param string $today
     * @param int $status
     * @param array $searched_ids
     * @return \Illuminate\Support\Collection
     */
    public function fetchByOperationStartMonthAndStatus(string $today, int $status, array $searched_ids = []): SupportCollection;

    /**
     * @param string $today
     * @param array $searched_ids
     * @return \Illuminate\Support\Collection
     */
    public function fetchNewUserOfThisMonth(string $today, array $searched_ids = []): SupportCollection;

    /**
     * @param string $today
     * @param array $searched_ids
     * @return \Illuminate\Support\Collection
     */
    public function fetchNotNewUserOfThisMonth(string $today, array $searched_ids = []): SupportCollection;

    /**
     * @param string $status
     * @param array $searched_ids
     * @return \Illuminate\Support\Collection
     */
    public function fetchByStatus(string $status, array $searched_ids = []): SupportCollection;

    /**
     * @param string $interview_month
     * @param array $searched_ids
     * @return \Illuminate\Support\Collection
     */
    public function fetchByInterviewMonth(string $interview_month, array $searched_ids = []): SupportCollection;

    /**
     * @param string $assign_month
     * @param array $searched_ids
     * @return \Illuminate\Support\Collection
     */
    public function fetchByAssignMonth(string $assign_month, array $searched_ids = []): SupportCollection;

    /**
     * @param string $today
     * @param int $status
     * @param array $searched_ids
     * @return \Illuminate\Support\Collection
     */
    public function fetchByInterviewMonthAndStatus(string $today, int $status, array $searched_ids = []): SupportCollection;

    /**
     * @param string $today
     * @param array $searched_ids
     * @return \Illuminate\Support\Collection
     */
    public function fetchFinProjectUserOfThisMonth(string $today, array $searched_ids = []): SupportCollection;

    /**
     * @param \App\Services\AdminUser\TotalUserPoints\TotalUserPointsParameter $parameter
     * @return void
     */
    public function insertUserPoints(TotalUserPointsParameter $parameter): void;


    /**
     * @param int $user_id
     */
    public function createInviteCode(int $user_id): void;

    /**
     * @param int $user_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function invitedUserList(int $user_id): Collection;
}
