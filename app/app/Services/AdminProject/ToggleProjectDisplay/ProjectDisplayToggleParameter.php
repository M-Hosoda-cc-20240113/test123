<?php


namespace App\Services\AdminProject\ToggleProjectDisplay;


class ProjectDisplayToggleParameter
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
     * @return ProjectDisplayToggleParameter
     */
    public function setProjectId(int $project_id): ProjectDisplayToggleParameter
    {
        $this->project_id = $project_id;
        return $this;
    }
}
