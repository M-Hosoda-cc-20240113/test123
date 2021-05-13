<?php

namespace App\Infrastructures\Repositories\Eloquent\User;

use App\Mail\RegisterMail;
use App\Models\RelLevelSkillUser;
use App\Models\User;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use App\Services\User\UpdateUser\UpdateUserParameter;
use App\Services\User\UserRepositoryInterface;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
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
    public function fetchBySkillIds(array $skill_ids, array $searched_ids = []): Collection
    {
        $user_id = RelLevelSkillUser::whereIn('skill_id', $skill_ids)
            ->select('user_id')
            ->get()->toArray();
        if ($searched_ids) {
            return User::where('is_admin', 0)
                ->whereIn('id', $searched_ids)
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
    public function fetchByLevelIds(array $level_ids, array $searched_ids = []): Collection
    {
        $user_id = RelLevelSkillUser::where('level_id', $level_ids[0])
            ->select('user_id')
            ->get()->toArray();
        if ($searched_ids) {
            return User::where('is_admin', 0)
                ->whereIn('id', $searched_ids)
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
    public function fetchByNewUser(array $searched_ids = []): Collection
    {
        if ($searched_ids) {
            return User::where('is_admin', 0)
                ->where('is_new', 1)
                ->whereIn('id', $searched_ids)
                ->get();
        }
        return User::where('is_admin', 0)
            ->where('is_new', 1)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByNotNewUser(array $searched_ids = []): Collection
    {
        if ($searched_ids) {
            return User::where('is_admin', 0)
                ->where('is_new', 0)
                ->whereIn('id', $searched_ids)
                ->get();
        }
        return User::where('is_admin', 0)
            ->where('is_new', 0)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByIsWorking(array $searched_ids = []): Collection
    {
        if ($searched_ids) {
            return User::where('is_admin', 0)
                ->where('is_working', 1)
                ->whereIn('id', $searched_ids)
                ->get();
        }
        return User::where('is_admin', 0)
            ->where('is_working', 1)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByIsNotWorking(array $searched_ids = []): Collection
    {
        if ($searched_ids) {
            return User::where('is_admin', 0)
                ->where('is_working', 0)
                ->whereIn('id', $searched_ids)
                ->get();
        }
        return User::where('is_admin', 0)
            ->where('is_working', 0)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByOperationStartMonth(string $operation_start_month, array $searched_ids = []): Collection
    {
        $operation_date = new CarbonImmutable($operation_start_month);
        $start_of_month = $operation_date->startOfMonth();
        $end_of_month = $operation_date->endOfMonth();
        if ($searched_ids) {
            return User::where('is_admin', 0)
                ->whereIn('id', $searched_ids)
                ->whereBetween('operation_start_month', [$start_of_month, $end_of_month])
                ->get();
        }
        return User::where('is_admin', 0)
            ->whereBetween('operation_start_month', [$start_of_month, $end_of_month])
            ->get();
    }

    /**
     * {@inheritDoc}
     * status: 0：未営業、1：面談待ち、2：結果待ち、3：稼働済み
     */
    public function fetchNotOpenUserOfThisMonth(string $today, array $searched_ids = []): Collection
    {
        $today = new CarbonImmutable($today);
        $start_of_month = $today->startOfMonth();
        $end_of_month = $today->endOfMonth();
        if ($searched_ids) {
            return User::whereIn('id', function ($query) {
                $query->from('statuses')
                    ->select('user_id')
                    ->where('status', 0);
            })->whereBetween('operation_start_month', [$start_of_month, $end_of_month])
                ->whereIn('id', $searched_ids)
                ->get();
        }
        return User::whereIn('id', function ($query) {
            $query->from('statuses')
                ->select('user_id')
                ->where('status', 0);
        })->whereBetween('operation_start_month', [$start_of_month, $end_of_month])
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchNewUserOfThisMonth(string $today, array $searched_ids = []): Collection
    {
        $today = new CarbonImmutable($today);
        $start_of_month = $today->startOfMonth();
        $end_of_month = $today->endOfMonth();
        if ($searched_ids) {
            return User::whereIn('id', function ($query) use ($start_of_month, $end_of_month) {
                $query->from('assignments')
                    ->select('user_id')
                    ->whereBetween('assignment_start_date', [$start_of_month, $end_of_month]);
            })->where('is_new', 1)
                ->whereIn('id', $searched_ids)
                ->get();
        }
        return User::whereIn('id', function ($query) use ($start_of_month, $end_of_month) {
            $query->from('assignments')
                ->select('user_id')
                ->whereBetween('assignment_start_date', [$start_of_month, $end_of_month]);
        })->where('is_new', 1)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchNotNewUserOfThisMonth(string $today, array $searched_ids = []): Collection
    {
        $today = new CarbonImmutable($today);
        $start_of_month = $today->startOfMonth();
        $end_of_month = $today->endOfMonth();
        if ($searched_ids) {
            return User::whereIn('id', function ($query) use ($start_of_month, $end_of_month) {
                $query->from('assignments')
                    ->select('user_id')
                    ->whereBetween('assignment_start_date', [$start_of_month, $end_of_month]);
            })->where('is_new', 0)
                ->whereIn('id', $searched_ids)
                ->get();
        }
        return User::whereIn('id', function ($query) use ($start_of_month, $end_of_month) {
            $query->from('assignments')
                ->select('user_id')
                ->whereBetween('assignment_start_date', [$start_of_month, $end_of_month]);
        })->where('is_new', 0)
            ->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchInterviewUserOfThisMonth(string $today, array $searched_ids = []): Collection
    {
        $today = new CarbonImmutable($today);
        $start_of_month = $today->startOfMonth();
        $end_of_month = $today->endOfMonth();
        if ($searched_ids) {
            return User::whereIn('id', function ($query) use ($start_of_month, $end_of_month) {
                $query->from('applications')
                    ->select('user_id')
                    ->whereBetween('interview_date', [$start_of_month, $end_of_month]);
            })->whereIn('id', $searched_ids)
                ->get();
        }

        return User::whereIn('id', function ($query) use ($start_of_month, $end_of_month) {
            $query->from('applications')
                ->select('user_id')
                ->whereBetween('interview_date', [$start_of_month, $end_of_month]);
        })->get();
    }
}
