<?php

namespace App\Services\Notification\ApplyUser;


use App\Models\User;

class NotificationApplyUserParameter
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $project_name;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return NotificationApplyUserParameter
     */
    public function setUser(User $user): NotificationApplyUserParameter
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getProjectName(): string
    {
        return $this->project_name;
    }

    /**
     * @param string $project_name
     * @return NotificationApplyUserParameter
     */
    public function setProjectName(string $project_name): NotificationApplyUserParameter
    {
        $this->project_name = $project_name;
        return $this;
    }
}
