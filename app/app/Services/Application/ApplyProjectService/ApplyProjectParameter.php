<?php


namespace App\Services\Application\ApplyProjectService;


use App\Models\User;

class ApplyProjectParameter
{
    /**
     * @var int
     */
    private $project_id;

    /**
     * @var User
     */
    private $user;

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->project_id;
    }

    /**
     * @param int $project_id
     * @return ApplyProjectParameter
     */
    public function setProjectId(int $project_id): ApplyProjectParameter
    {
        $this->project_id = $project_id;
        return $this;
    }

    /**
     * @return \App\Models\User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param \App\Models\User $user
     * @return ApplyProjectParameter
     */
    public function setUser(User $user): ApplyProjectParameter
    {
        $this->user = $user;
        return $this;
    }
}
