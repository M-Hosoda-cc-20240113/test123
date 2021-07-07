<?php


namespace App\Services\AdminProject\DeleteProject;


/**
 * Class DeleteProjectParameter
 * @package App\Services\AdminProject\DeleteProject
 */
class DeleteProjectParameter
{
    /**
     * @var []
     */
    private $project_ids;

    /**
     * @return array|null
     */
    public function getProjectIds(): ?array
    {
        return $this->project_ids;
    }

    /**
     * @param array $project_ids
     * @return DeleteProjectParameter
     */
    public function setProjectIds(array $project_ids): DeleteProjectParameter
    {
        $this->project_ids = $project_ids;
        return $this;
    }


}
