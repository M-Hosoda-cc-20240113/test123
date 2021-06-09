<?php


namespace App\Services\Notification\AssignUser;


class NotificationAssignUserParameter
{
    /**
     * @var string
     */
    private $user_name;

    /**
     * @var string
     */
    private $project_name;

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @param string $user_name
     * @return NotificationAssignUserParameter
     */
    public function setUserName(string $user_name): NotificationAssignUserParameter
    {
        $this->user_name = $user_name;
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
     * @return NotificationAssignUserParameter
     */
    public function setProjectName(string $project_name): NotificationAssignUserParameter
    {
        $this->project_name = $project_name;
        return $this;
    }
}
