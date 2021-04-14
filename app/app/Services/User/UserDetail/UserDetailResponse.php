<?php

namespace App\Services\User\UserDetail;

use App\Models\User;
use Illuminate\Support\Collection;

class UserDetailResponse
{
  /**
   * @var User
   */
  private $user;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return UserDetailResponse
     */
    public function setUser(User $user): UserDetailResponse
    {
        $this->user = $user;
        return $this;
    }
}
