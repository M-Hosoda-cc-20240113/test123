<?php


namespace App\Services\AdminUser\DeleteUser;

/**
 * Class DeleteUserParameter
 * @package App\Services\AdminUser\DeleteUSer
 */
class DeleteUserParameter
{
    /**
     * @var int
     */
    private $user_id;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return DeleteUserParameter
     */
    public function setUserId(int $user_id): DeleteUserParameter
    {
        $this->user_id = $user_id;
        return $this;
    }
}
