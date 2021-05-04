<?php


namespace App\Services\Status;

use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;

interface StatusRepositoryInterface
{
    /**
     * @param UpdateUserAdminParameter $parameter
     */
    public function updateAdmin(UpdateUserAdminParameter $parameter): void;
}
