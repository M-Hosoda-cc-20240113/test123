<?php

namespace App\Services\User\UserDetail;

use App\Services\User\UserRepositoryInterface;

class UserDetailService
{
  /**
   * @var UserRepositoryInterface
   */
  private $user_reopsitory;

  public function __construct(UserRepositoryInterface $user_repository) 
  {
    $this->user_reopsitory = $user_repository;
  }

  public function exec(int $id)
  {
    return $this->user_reopsitory->detail($id);
  }
}
