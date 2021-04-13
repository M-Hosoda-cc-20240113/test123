<?php

namespace App\Services\Application\ApplicationList;

use App\Services\Application\ApplicationRepositoryInterface;

class ApplicationListService
{
  /**
   * @var ApplicationRepositoryInterface
   */
  private $application_reopsitory;

  public function __construct(
    ApplicationRepositoryInterface $application_repository
  ) {
    $this->application_reopsitory = $application_repository; 
  }

  public function exec()
  {
    return $this->application_reopsitory->all();
  }
}
