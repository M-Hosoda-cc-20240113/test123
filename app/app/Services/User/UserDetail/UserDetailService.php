<?php

namespace App\Services\User\UserDetail;

use App\Services\User\UserRepositoryInterface;

class UserDetailService
{
  /**
   * @var UserRepositoryInterface
   */
  private $user_repository;

  public function __construct(UserRepositoryInterface $user_repository)
  {
    $this->user_repository = $user_repository;
  }

  public function exec(int $id): \App\Models\User
  {
    return $this->user_repository->detail($id);
  }
}
