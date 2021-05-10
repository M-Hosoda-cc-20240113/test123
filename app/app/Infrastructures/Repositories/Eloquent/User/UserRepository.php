<?php

namespace App\Infrastructures\Repositories\Eloquent\User;

use App\Mail\RegisterMail;
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
        $length = count($skill_ids);
        $arr = join(",", $skill_ids);
        $target_ids = \DB::select(\DB::raw("(
            SELECT u.id FROM users AS u
            INNER JOIN
            (
                SELECT lsu.user_id, count(*) AS s
                FROM rel_levels_skills_users AS lsu
                WHERE lsu.skill_id IN (" . $arr . ")
                GROUP BY lsu.user_id
                HAVING s = $length
            ) AS summary
            ON u.id = summary.user_id
        )"));

        return User::where('is_admin', 0)
            ->whereNotIn('id', $exclude_ids)
            ->whereIn('id', array_column($target_ids, 'id'))
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByLevelIds(array $level_ids, array $exclude_ids = []): Collection
    {
        $length = count($level_ids);
        $arr = join(",", $level_ids);
        $target_ids = \DB::select(\DB::raw("(
            SELECT u.id FROM users AS u
            INNER JOIN
            (
                SELECT lsu.user_id, count(*) AS s
                FROM rel_levels_skills_users AS lsu
                WHERE lsu.level_id IN (" . $arr . ")
                GROUP BY lsu.user_id
                HAVING s = $length
            ) AS summary
            ON u.id = summary.user_id
        )"));

        return User::with('levels')
            ->where('is_admin', 0)
            ->whereNotIn('id', $exclude_ids)
            ->whereIn('id', array_column($target_ids, 'id'))
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByNewUser($new_user, array $exclude_ids = []): Collection
    {
        return User::where('is_admin', 0)
            ->where('is_new', $new_user)
            ->whereNotIn('id', $exclude_ids)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByNotNewUser($not_new_user, array $exclude_ids = []): Collection
    {
        return User::where('is_admin', 0)
            ->where('is_new', "!=", $not_new_user)
            ->whereNotIn('id', $exclude_ids)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByIsWorking($is_working, array $exclude_ids = []): Collection
    {
        return User::where('is_admin', 0)
            ->where('is_working', $is_working)
            ->whereNotIn('id', $exclude_ids)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByIsNotWorking($is_not_working, array $exclude_ids = []): Collection
    {
        return User::where('is_admin', 0)
            ->where('is_working', "!=", $is_not_working)
            ->whereNotIn('id', $exclude_ids)
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
        return User::where('is_admin', 0)
            ->whereNotIn('id', $exclude_ids)
            ->whereBetween('operation_start_month', [$start_of_month, $end_of_month])
            ->get();
    }
}
