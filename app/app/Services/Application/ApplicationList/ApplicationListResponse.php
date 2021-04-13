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
   * @return  Application[]
   */ 
  public function getApplications()
  {
    return $this->applications;
  }

  /**
   * Set the value of applications
   *
   * @param  Application[]  $applications
   *
   * @return  self
   */ 
  public function setApplications(Collection $applications)
  {
    $this->applications = $applications;

    return $this;
  }
}
