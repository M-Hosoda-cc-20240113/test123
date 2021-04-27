<?php


namespace App\Services\RelPositionProject;


interface RelPositionProjectRepositoryInterface
{
    /**
     * @param $project_id
     */
    public function deleteByProjectId($project_id): void;
}
