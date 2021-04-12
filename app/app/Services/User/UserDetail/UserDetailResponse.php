<?php

namespace App\Services\User\UserDetail;

use App\Models\User;
use Illuminate\Support\Collection;

class UserDetailResponse
{
  /**
   * @var User[]
   */
  private $user;

  /**
   * Get the value of user
   *
   * @return  User[]
   */ 
  public function getUser()
  {
    return $this->user;
  }

  /**
   * Set the value of user
   *
   * @param  User[]  $user
   *
   * @return  self
   */
  public function setUser(User $user)
  {
    $this->user = $user;

    return $this;
  }
}
