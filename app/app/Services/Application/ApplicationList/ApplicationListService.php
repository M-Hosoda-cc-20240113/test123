<?php

namespace App\Services\Application\ApplicationList;

use App\Services\Application\ApplicationRepositoryInterface;
use Illuminate\Support\Collection;

class ApplicationListService
{
    /**
     * @var ApplicationRepositoryInterface
     */
    private $application_repository;

    /**
     * ApplicationListService constructor.
     * @param \App\Services\Application\ApplicationRepositoryInterface $application_repository
     */
    public function __construct(
        ApplicationRepositoryInterface $application_repository
    ) {
        $this->application_repository = $application_repository;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function exec(): Collection
    {
        return $this->application_repository->all();
    }
}
