<?php

namespace App\Services\Application\ApplicationList;

use App\Services\Application\ApplicationRepositoryInterface;
use App\Services\Status\StatusRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class ApplicationListService
 * @package App\Services\Application\ApplicationList
 */
class ApplicationListService
{
    /**
     * @var ApplicationRepositoryInterface
     */
    private $application_repository;

    /**
     * @var StatusRepositoryInterface
     */
    private $status_repository;

    /**
     * ApplicationListService constructor.
     * @param \App\Services\Application\ApplicationRepositoryInterface $application_repository
     * @param \App\Services\Status\StatusRepositoryInterface $status_repository
     */
    public function __construct(
        ApplicationRepositoryInterface $application_repository,
        StatusRepositoryInterface $status_repository
    ) {
        $this->application_repository = $application_repository;
        $this->status_repository = $status_repository;
    }


    /**
     * @return Collection
     */
    public function exec(): Collection
    {
        $application = $this->application_repository->all();
        $status = $this->status_repository->all();
        $merged = collect();
        return $merged->merge(['applications' => $application])->merge(['statuses' => $status]);
    }
}
