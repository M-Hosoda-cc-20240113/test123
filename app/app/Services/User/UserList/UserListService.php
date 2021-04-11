<?php

namespace App\Services\User\UserList;

use App\Services\User\UserRepositoryInterface;

class UserListService
{
  /**
   * @var UserRepositoryInterface
   */
  private $user_reopsitory;

  public function __construct(
    UserRepositoryInterface $user_repository
  ) {
    $this->user_reopsitory = $user_repository; 
  }

  public function exec()
  {
    return $this->user_reopsitory->all();
  }
}
