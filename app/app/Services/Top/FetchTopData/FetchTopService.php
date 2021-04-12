<?php

namespace App\Services\Top\FetchTopData;

use App\Services\Top\FetchTopDataRepositoryInterface;

class FetchTopService
{
  /**
   * @var FetchTopDataRepositoryInterface
   */
  private $fetch_top_reopsitory;

  public function __construct(UserRepositoryInterface $fetch_top_reopsitory) 
  {
    $this->fetch_top_reopsitory = $fetch_top_reopsitory; 
  }

  public function exec()
  {
    return $this->fetch_top_reopsitory->all();
  }
}
