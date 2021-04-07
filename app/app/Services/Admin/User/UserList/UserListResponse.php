<?php

namespace App\Services\Admin\User\UserList;

use App\Models\User;
use Illuminate\Support\Collection;

class UserListResponse
{
  /**
   * @var User[]
   */
  private $users;

  /**
   * Get the value of users
   *
   * @return  User[]
   */ 
  public function getUsers()
  {
    return $this->users;
  }

  /**
   * Set the value of users
   *
   * @param  User[]  $users
   *
   * @return  self
   */ 
  public function setUsers(Collection $users)
  {
    $this->users = $users;

    return $this;
  }
}
