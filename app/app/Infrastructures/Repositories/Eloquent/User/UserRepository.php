<?php

namespace App\Infrastructures\Repositories\Eloquent\User;

use App\Mail\RegisterMail;
use App\Models\User;
use App\Services\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class UserRepository implements UserRepositoryInterface
{
  /**
   * {@inheritDoc}
   */
  public function all(): Collection
  {
      return User::all();
  }

  /**
   * {@inheritDoc}
   */
  public static function makeEmailHash(string $email)
  {
      return hash(config('app.hash_email.algo'), $email . config('app.hash_email.salt'));
  }

  /**
    * {@inheritDoc}
    */
  public function detail(int $id)
  {
      return User::with('project_app')
          ->with('project_assign')
          ->findOrFail($id);
  }

    /**
     *
     */
    public function register(array $request)
  {
      Mail::to($request['email'])->send(new RegisterMail($request));
      return User::create([
            'sei'       => $request['sei'],
            'mei'       => $request['mei'],
            'sei_kana'  => $request['sei_kana'],
            'mei_kana'  => $request['mei_kana'],
            'birthday'  => $request['birthday'],
            'tel'       => $request['tel'],
            'email'     => $request['email'],
            'email_hash'=> hash(config('app.hash_email.algo'),$request['email']. config('app.hash_email.salt')),
            'password'  => bcrypt($request['password']),
        ]);
  }
}
