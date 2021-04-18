<?php

namespace App\Services\Application\ApplicationList;

use App\Services\Application\ApplicationRepositoryInterface;

class ApplicationListService
{
  /**
   * @var ApplicationRepositoryInterface
   */
  private $application_repository;

  public function __construct(
    ApplicationRepositoryInterface $application_repository
  ) {
    $this->application_repository = $application_repository;
  }

  public function exec()
  {
    return $this->application_repository->all();
  }
}
