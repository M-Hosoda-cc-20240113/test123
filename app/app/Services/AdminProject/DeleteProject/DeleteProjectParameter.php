<?php


namespace App\Services\AdminProject\DeleteProject;


class DeleteProjectParameter
{
    /**
     * @var int[]
     */
    private $project_id;

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->project_id;
    }

    /**
     * @param int $project_id
     * @return DeleteProjectParameter
     */
    public function setProjectId(int $project_id): DeleteProjectParameter
    {
        $this->project_id = $project_id;
        return $this;
    }
}
