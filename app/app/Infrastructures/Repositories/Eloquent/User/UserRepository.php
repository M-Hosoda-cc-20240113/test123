<?php

namespace App\Infrastructures\Repositories\Eloquent\User;

use App\Mail\RegisterMail;
use App\Models\RelLevelSkillUser;
use App\Models\User;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use App\Services\User\UpdateUser\UpdateUserParameter;
use App\Services\User\UserRepositoryInterface;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

/**
 * Class UserRepository
 * @package App\Infrastructures\Repositories\Eloquent\User
 */
class UserRepository implements UserRepositoryInterface
{

    /**
     * {@inheritdoc}
     * @return Collection
     */
    public function all(): Collection
    {
        return User::where('is_admin', 0)->get();
    }


    /**
     * {@inheritdoc}
     */
    public static function makeEmailHash(string $email): string
    {
        return hash(config('app.hash_email.algo'), $email . config('app.hash_email.salt'));
    }


    /**
     * {@inheritdoc}
     */
    public function findByEmailHash(string $email_hash): User
    {
        return User::where('email_hash', $email_hash)->first();
    }


    /**
     * {@inheritdoc}
     */
    public function fetchWithProjectsThroughApplicationOrAssignment(int $user_id)
    {
        return User::with('project_app')
            ->with('project_assign')
            ->with('project_status')
            ->findOrFail($user_id);
    }


    /**
     * {@inheritdoc}
     */
    public function update(UpdateUserParameter $parameter): void
    {
        DB::transaction(function () use ($parameter) {
            $user = $parameter->getUser();

            $user->sei = $parameter->getSei();
            $user->sei_kana = $parameter->getSeiKana();
            $user->mei = $parameter->getMei();
            $user->mei_kana = $parameter->getMeiKana();
            $user->tel = $parameter->getTel();
            $user->birthday = $parameter->getBirthday();
            $user->save();
        });
    }


    /**
     * {@inheritdoc}
     */
    public function register(array $request)
    {
        Mail::to($request['email'])->send(new RegisterMail($request));
        return User::create([
            'sei' => $request['sei'],
            'mei' => $request['mei'],
            'sei_kana' => $request['sei_kana'],
            'mei_kana' => $request['mei_kana'],
            'birthday' => $request['birthday'],
            'tel' => $request['tel'],
            'email' => $request['email'],
            'email_hash' => hash(config('app.hash_email.algo'), $request['email'] . config('app.hash_email.salt')),
            'password' => bcrypt($request['password']),
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function findByEmail(string $email): ?User
    {
        return User::where('email_hash', $this->makeEmailHash($email))->first();
    }


    /**
     * {@inheritdoc}
     */
    public function changeEmail(User $user, string $wanna_change_email)
    {
        $user->email = $wanna_change_email;
        $user->email_hash = self::makeEmailHash($wanna_change_email);
        $user->save();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $user_id): void
    {
        $user = User::findOrFail($user_id);
        $user->skills()->detach();
        $user->levels()->detach();
        $user->project_app()->detach();
        $user->project_assign()->detach();
        $user->project_status()->detach();
        $user->delete();
    }

    /**
     * {@inheritDoc}
     */
    public function updateAdmin(UpdateUserAdminParameter $parameter): User
    {
        $user = User::findOrFail($parameter->getUserId());
        $user->operation_start_month = $parameter->getOperationStartMonth() ?? null;
        $user->remarks = $parameter->getRemarks() ?? null;
        $user->save();
        return $user;
    }

    /**
     * {@inheritDoc}
     */
    public function fetchThisMonthOperation(): ?Collection
    {
        $now = CarbonImmutable::now();
        $start_of_month = $now->startOfMonth();
        $end_of_month = $now->endOfMonth();
        return User::whereBetween('operation_start_month', [$start_of_month, $end_of_month])->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByKeyWord(array $keywords, array $exclude_ids = []): Collection
    {
        $query = User::where('is_admin', 0)
            ->whereNotIn('id', $exclude_ids);

        foreach ($keywords as $keyword) {
            $like_keyword = '%' . $keyword . '%';
            $query->where(static function (Builder $query) use ($like_keyword) {
                $query->where('email_hash', 'like', $like_keyword)
                    ->orWhere('sei', 'like', $like_keyword)
                    ->orWhere('sei_kana', 'like', $like_keyword)
                    ->orWhere('mei', 'like', $like_keyword)
                    ->orWhere('mei_kana', 'like', $like_keyword)
                    ->orWhere('tel', 'like', $like_keyword)
                    ->orWhere('operation_start_month', 'like', $like_keyword)
                    ->orWhere('remarks', 'like', $like_keyword)
                    ->orWhere('birthday', 'like', $like_keyword);
            });
        }
        dd($query->get());
        return $query->get();
    }


    /**
     * {@inheritDoc}
     */
    public function fetchBySkillIds(array $skill_ids, array $exclude_ids = []): Collection
    {
        $user_id = RelLevelSkillUser::whereIn('skill_id', $skill_ids)
            ->select('user_id')
            ->get()->toArray();
        if ($exclude_ids){
            return User::where('is_admin', 0)
                ->whereIn('id', $exclude_ids)
                ->whereIn('id', $user_id)
                ->get();
        }
        return User::where('is_admin', 0)
            ->whereIn('id', $user_id)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByLevelIds(array $level_ids, array $exclude_ids = []): Collection
    {
        $user_id = RelLevelSkillUser::where('level_id', $level_ids[0])
            ->select('user_id')
            ->get()->toArray();
        if ($exclude_ids){
            return User::where('is_admin', 0)
                ->whereIn('id', $exclude_ids)
                ->whereIn('id', $user_id)
                ->get();
        }
        return User::where('is_admin', 0)
            ->whereIn('id', $user_id)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByNewUser(array $exclude_ids = []): Collection
    {
        if ($exclude_ids){
            return User::where('is_admin', 0)
                ->where('is_new', 1)
                ->whereIn('id', $exclude_ids)
                ->get();
        }
        return User::where('is_admin', 0)
            ->where('is_new', 1)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByNotNewUser(array $exclude_ids = []): Collection
    {
        if ($exclude_ids){
            return User::where('is_admin', 0)
                ->where('is_new', 0)
                ->whereIn('id', $exclude_ids)
                ->get();
        }
        return User::where('is_admin', 0)
            ->where('is_new', 0)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByIsWorking(array $exclude_ids = []): Collection
    {
        if ($exclude_ids){
            return User::where('is_admin', 0)
                ->where('is_working', 1)
                ->whereIn('id', $exclude_ids)
                ->get();
        }
        return User::where('is_admin', 0)
            ->where('is_working', 1)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByIsNotWorking(array $exclude_ids = []): Collection
    {
        if ($exclude_ids){
            return User::where('is_admin', 0)
                ->where('is_working', 0)
                ->whereIn('id', $exclude_ids)
                ->get();
        }
        return User::where('is_admin', 0)
            ->where('is_working', 0)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByOperationStartMonth(string $operation_start_month, array $exclude_ids = []): Collection
    {
        $operation_date = new CarbonImmutable($operation_start_month);
        $start_of_month = $operation_date->startOfMonth();
        $end_of_month = $operation_date->endOfMonth();
        if ($exclude_ids){
            return User::where('is_admin', 0)
                ->whereIn('id', $exclude_ids)
                ->whereBetween('operation_start_month', [$start_of_month, $end_of_month])
                ->get();
        }
        return User::where('is_admin', 0)
            ->whereBetween('operation_start_month', [$start_of_month, $end_of_month])
            ->get();
    }
}
