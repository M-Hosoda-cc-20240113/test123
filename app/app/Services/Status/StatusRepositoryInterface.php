<?php


namespace App\Services\Status;

use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;

interface StatusRepositoryInterface
{
    public function updateAdmin(UpdateUserAdminParameter $parameter): void;
}
