<?php

namespace App\Infrastructures\Repositories\Eloquent\User;

use App\Models\RelLevelSkillUser;
use App\Models\User;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use App\Services\User\RegisterUser\RegisterUserParameter;
use App\Services\User\UpdateUser\UpdateUserParameter;
use App\Services\User\UserRepositoryInterface;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 * @package App\Infrastructures\Repositories\Eloquent\User
 */
class UserRepository implements UserRepositoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function all(): Collection
    {
        return User::where('is_admin', 0)
            ->with('project_app')
            ->get();
    }


    /**
     * {@inheritdoc}
     */
    public static function makeEmailHash(string $email): string
    {
        return hash(config('app.hash_email.algo'), $email . config('app.hash_email.salt'));
    }

    /**
     * {@inheritDoc}
     */
    public function makeTelHash(string $tel): string
    {
        return hash(config('app.hash_email.algo'), $tel . config('app.hash_email.salt'));
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
    public function register(RegisterUserParameter $parameter): User
    {
        return User::create([
            'sei' => $parameter->getSei(),
            'mei' => $parameter->getMei(),
            'sei_kana' => $parameter->getSeiKana(),
            'mei_kana' => $parameter->getMeiKana(),
            'birthday' => $parameter->getBirthday(),
            'tel' => $parameter->getTel(),
            'tel_hash' => hash(config('app.hash_email.algo'), $parameter->getTel() . config('app.hash_email.salt')),
            'email' => $parameter->getEmail(),
            'email_hash' => hash(config('app.hash_email.algo'), $parameter->getEmail() . config('app.hash_email.salt')),
            'password' => bcrypt($parameter->getPassword()),
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
     * {@inheritDoc}
     */
    public function findByTel(string $tel): ?User
    {
        return User::where('tel_hash', $this->makeTelHash($tel))->first();
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
        $user->remarks = $parameter->getRemarks() ?? null;
        $user->save();
        return $user;
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
    public function fetchByOperationStartMonth(string $operation_start_month, array $searched_ids = []): SupportCollection
    {
        $operation_date = new CarbonImmutable($operation_start_month);
        $start_of_month = $operation_date->startOfMonth();
        $end_of_month = $operation_date->endOfMonth();
        if ($searched_ids) {
            return User::where('is_admin', 0)
                ->whereIn('id', $searched_ids)
                ->whereIn('id', function ($query) use ($start_of_month, $end_of_month) {
                    $query->from('applications')
                        ->select('user_id')
                        ->whereNotNull('operation_start_month')
                        ->whereBetween('operation_start_month', [$start_of_month, $end_of_month]);
                })->get();
        }
        return User::whereIn('id', function ($query) use ($start_of_month, $end_of_month) {
            $query->from('applications')
                ->select('user_id')
                ->whereNotNull('operation_start_month')
                ->whereBetween('operation_start_month', [$start_of_month, $end_of_month]);
        })->where('is_admin', 0)
            ->get();
    }

    /**
     * {@inheritDoc}
     * status: 0：未営業、1：面談待ち、2：結果待ち、3：稼働済み
     */
    public function fetchByOperationStartMonthAndStatus(
        string $today,
        int $status,
        array $searched_ids = []
    ): SupportCollection {
        $today = new CarbonImmutable($today);
        $start_of_month = $today->startOfMonth();
        $end_of_month = $today->endOfMonth();
        $status_users = User::join('statuses', 'users.id', '=', 'statuses.user_id')
            ->where('statuses.status', '=', $status)
            ->whereIn('users.id', $searched_ids)
            ->select('users.*', 'statuses.project_id')
            ->get();
        $app_users = User::join('applications', 'users.id', '=', 'applications.user_id')
            ->whereBetween('applications.operation_start_month', [$start_of_month, $end_of_month])
            ->whereIn('users.id', $searched_ids)
            ->select('users.*', 'applications.project_id')
            ->get();
        $array_merged = [];
        foreach ($app_users as $app_user) {
            foreach ($status_users as $status_user) {
                if ($app_user['project_id'] === $status_user['project_id'] && $app_user['id'] === $status_user['id']) {
                    array_push($array_merged, $app_user);
                }
            }
        }
        return collect($array_merged);
    }

    /**
     * {@inheritDoc}
     */
    public function fetchNewUserOfThisMonth(string $today, array $searched_ids = []): SupportCollection
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
    public function fetchNotNewUserOfThisMonth(string $today, array $searched_ids = []): SupportCollection
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
    public function fetchByInterviewMonth(string $interview_month, array $searched_ids = []): SupportCollection
    {
        $month = new CarbonImmutable($interview_month);
        $start_of_month = $month->startOfMonth();
        $end_of_month = $month->endOfMonth();
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

    /**
     * {@inheritDoc}
     */
    public function fetchByStatus(string $status, array $searched_ids = []): SupportCollection
    {
        if ($searched_ids) {
            return User::whereIn('id', function ($query) use ($status) {
                $query->from('statuses')
                    ->select('user_id')
                    ->where('status', $status);
            })->whereIn('id', $searched_ids)
                ->get();
        }

        return User::whereIn('id', function ($query) use ($status) {
            $query->from('statuses')
                ->select('user_id')
                ->where('status', $status);
        })->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByAssignMonth(string $assign_month, array $searched_ids = []): SupportCollection
    {
        $month = new CarbonImmutable($assign_month);
        $start_of_month = $month->startOfMonth();
        $end_of_month = $month->endOfMonth();
        if ($searched_ids) {
            return User::whereIn('id', function ($query) use ($start_of_month, $end_of_month) {
                $query->from('assignments')
                    ->select('user_id')
                    ->whereBetween('assignment_start_date', [$start_of_month, $end_of_month]);
            })->whereIn('id', $searched_ids)
                ->get();
        }
        return User::whereIn('id', function ($query) use ($start_of_month, $end_of_month) {
            $query->from('assignments')
                ->select('user_id')
                ->whereBetween('assignment_start_date', [$start_of_month, $end_of_month]);
        })->get();
    }

    /**
     * {@inheritDoc}
     */
    public function fetchByInterviewMonthAndStatus(
        string $today,
        int $status,
        array $searched_ids = []
    ): SupportCollection {
        $today = new CarbonImmutable($today);
        $start_of_month = $today->startOfMonth();
        $end_of_month = $today->endOfMonth();
        $status_users = User::join('statuses', 'users.id', '=', 'statuses.user_id')
            ->where('statuses.status', '=', $status)
            ->whereIn('users.id', $searched_ids)
            ->select('users.*', 'statuses.project_id')
            ->get();
        $app_users = User::join('applications', 'users.id', '=', 'applications.user_id')
            ->whereBetween('applications.interview_date', [$start_of_month, $end_of_month])
            ->whereIn('users.id', $searched_ids)
            ->select('users.*', 'applications.project_id')
            ->get();
        $array_merged = [];
        foreach ($app_users as $app_user) {
            foreach ($status_users as $status_user) {
                if ($app_user['project_id'] === $status_user['project_id'] && $app_user['id'] === $status_user['id']) {
                    array_push($array_merged, $app_user);
                }
            }
        }
        return collect($array_merged);
    }
}
