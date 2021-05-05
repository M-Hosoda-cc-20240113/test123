<?php

namespace App\Services\Application\ApplicationList;

use Illuminate\Pagination\LengthAwarePaginator;

class ApplicationListResponse
{
    /**
     * @var LengthAwarePaginator
     */
    private $applications;

    /**
     * @return LengthAwarePaginator
     */
    public function getApplications(): LengthAwarePaginator
    {
        return $this->applications;
    }

    /**
     * @param LengthAwarePaginator $applications
     * @return ApplicationListResponse
     */
    public function setApplications(LengthAwarePaginator $applications): ApplicationListResponse
    {
        $this->applications = $applications;
        return $this;
    }
}
