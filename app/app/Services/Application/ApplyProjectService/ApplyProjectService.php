<?php


namespace App\Services\Application\ApplyProjectService;

use App\Services\Application\ApplicationRepositoryInterface;


class ApplyProjectService
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

    /**
     * @param int $project_id
     * @param $user
     */
    public function exec(int $project_id, $user)
    {
        $this->application_repository->create($project_id, $user);
    }
}
