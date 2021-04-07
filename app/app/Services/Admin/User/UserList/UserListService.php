<?php

namespace App\Services\Admin\User\UserList;

use App\Services\Admin\User\UserRepositoryInterface;

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
