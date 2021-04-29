<?php


namespace App\Services\AdminProject\DeletePosition;


use App\Services\RelPositionProject\RelPositionProjectRepositoryInterface;

class DeletePositionService
{
    /**
     * @var \App\Services\RelPositionProject\RelPositionProjectRepositoryInterface
     */
    private $rel_position_project_repository;

    /**
     * DeletePositionService constructor.
     * @param \App\Services\RelPositionProject\RelPositionProjectRepositoryInterface $rel_position_project_repository
     */
    public function __construct(RelPositionProjectRepositoryInterface $rel_position_project_repository)
    {
        $this->rel_position_project_repository = $rel_position_project_repository;
    }

    /**
     * @param $project_id
     */
    public function deleteByProjectId($project_id): void
    {
        $this->rel_position_project_repository->deleteByProjectId($project_id);
    }
}
