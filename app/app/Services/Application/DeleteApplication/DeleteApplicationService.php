<?php


namespace App\Services\Application\DeleteApplication;


use App\Services\Application\ApplicationRepositoryInterface;

class DeleteApplicationService
{
    /**
     * @var ApplicationRepositoryInterface
     */
    private $application_repository;

    /**
     * DeleteApplicationParameter constructor.
     * @param \App\Services\Application\ApplicationRepositoryInterface $application_repository
     */
    public function __construct(ApplicationRepositoryInterface $application_repository)
    {
        $this->application_repository = $application_repository;
    }

    /**
     * @param DeleteApplicationParameter $parameter
     */
    public function exec(DeleteApplicationParameter $parameter)
    {
        $this->application_repository->delete($parameter);
    }
}
