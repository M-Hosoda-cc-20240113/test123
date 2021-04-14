<?php

namespace App\Infrastructures\Repositories\Eloquent\User;

use App\Models\User;
use App\Services\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
  public function detail(int $id): User
  {
      return User::with('project_app')->findOrFail($id);
  }
}
