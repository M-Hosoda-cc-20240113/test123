<?php

namespace App\Services\Application;

use App\Models\Project;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use App\Services\Application\ApplyProjectService\ApplyProjectParameter;
use App\Services\Application\DeleteApplication\DeleteApplicationParameter;
use Illuminate\Support\Collection;

interface ApplicationRepositoryInterface
{
    /**
     * 申し込み状況情報
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection;

    /**
     * 案件応募
     * @param ApplyProjectParameter $parameter
     * @return Project
     */
    public function create(ApplyProjectParameter $parameter): Project;

    /**
     * @param UpdateUserAdminParameter $parameter
     */
    public function updateAdmin(UpdateUserAdminParameter $parameter): void;

    /**
     * @return Collection
     */
    public function fetchWithStatus(): Collection;

    /**
     * @param DeleteApplicationParameter $parameter
     */
    public function delete(DeleteApplicationParameter $parameter): void;
}
