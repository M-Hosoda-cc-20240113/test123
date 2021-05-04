<?php

namespace App\Services\Application\ApplicationList;

use App\Models\Application;
use Illuminate\Support\Collection;

class ApplicationListResponse
{
  /**
   * @var Application[]
   */
  private $applications;

    /**
     * Get the value of applications
     *
     * @return \Illuminate\Support\Collection
     */
  public function getApplications(): Collection
  {
    return $this->applications;
  }

    /**
     * Set the value of applications
     *
     * @param \Illuminate\Support\Collection $applications
     * @return ApplicationListResponse
     */
  public function setApplications(Collection $applications): ApplicationListResponse
  {
    $this->applications = $applications;

    return $this;
  }
}
