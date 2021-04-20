<?php

namespace App\Services\AdminUser\UserList;

use App\Services\User\UserRepositoryInterface;

class UserListService
{
  /**
   * @var UserRepositoryInterface
   */
  private $user_repository;

  public function __construct(
    UserRepositoryInterface $user_repository
  ) {
    $this->user_repository = $user_repository;
  }

  public function exec()
  {
    return $this->user_repository->all();
  }
}
