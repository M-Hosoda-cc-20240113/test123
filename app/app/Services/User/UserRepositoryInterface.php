<?php

namespace App\Services\User;

interface UserRepositoryInterface
{
  public function all();

  /**
   * メールアドレスのhashを生成
   *
   * @param string $email
   * @return string
   */
  public static function makeEmailHash(string $email);
}
