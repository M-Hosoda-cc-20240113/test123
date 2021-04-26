<?php

namespace App\Infrastructures\Repositories\Eloquent\User;

use App\Mail\RegisterMail;
use App\Models\User;
use App\Services\User\UpdateUser\UpdateUserParameter;
use App\Services\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserRepository implements UserRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function all(): Collection
    {
        return User::where('is_admin', 0)->get();
    }

    /**
     * {@inheritDoc}
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
     * {@inheritDoc}
     */
    public function fetchWithProjectsThroughApplicationOrAssignment(int $user_id)
    {
        return User::with('project_app')
            ->with('project_assign')
            ->findOrFail($user_id);
    }

    /**
     * {@inheritDoc}
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
     * {@inheritDoc}
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
     * {@inheritDoc}
     */
    public function changeEmail(User $user, string $wanna_change_email)
    {
        $user->email = $wanna_change_email;
        $user->email_hash = self::makeEmailHash($wanna_change_email);
        $user->save();
    }
}
