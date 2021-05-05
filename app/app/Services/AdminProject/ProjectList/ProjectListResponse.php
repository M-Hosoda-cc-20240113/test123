<?php

namespace App\Services\AdminProject\ProjectList;

use Illuminate\Pagination\LengthAwarePaginator;

class ProjectListResponse
{
    /**
     * @var \Illuminate\Pagination\LengthAwarePaginator
     */
    private $projects;

    /**
     * @return LengthAwarePaginator
     */
    public function getProjects(): LengthAwarePaginator
    {
        return $this->projects;
    }

    /**
     * @param LengthAwarePaginator $projects
     * @return ProjectListResponse
     */
    public function setProjects(LengthAwarePaginator $projects): ProjectListResponse
    {
        $this->projects = $projects;
        return $this;
    }
}
