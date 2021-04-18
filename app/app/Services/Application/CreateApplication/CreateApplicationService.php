<?php


namespace App\Services\Application\CreateApplication;

use App\Services\Application\ApplicationRepositoryInterface;


class CreateApplicationService
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

    public function exec(int $id, $user)
    {
        return $this->application_repository->create($id, $user);
    }
}
