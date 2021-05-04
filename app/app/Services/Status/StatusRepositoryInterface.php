<?php


namespace App\Services\Status;

use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use Illuminate\Database\Eloquent\Collection;

interface StatusRepositoryInterface
{

    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param UpdateUserAdminParameter $parameter
     */
    public function updateAdmin(UpdateUserAdminParameter $parameter): void;
}
