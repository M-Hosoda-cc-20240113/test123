<?php


namespace App\Services\Application\ApplyProjectService;

use App\Services\Application\ApplicationRepositoryInterface;


class ApplyProjectService
{
    /**
     * @var ApplicationRepositoryInterface
     */
    private $application_repository;

    /**
     * ApplyProjectService constructor.
     * @param ApplicationRepositoryInterface $application_repository
     */
    public function __construct(
        ApplicationRepositoryInterface $application_repository
    ) {
        $this->application_repository = $application_repository;
    }

    /**
     * @param ApplyProjectParameter $parameter
     */
    public function exec(ApplyProjectParameter $parameter)
    {
        $this->application_repository->create($parameter);
    }
}
