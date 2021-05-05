<?php

namespace App\Services\Application;

use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
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
     * @param $project_id
     * @param \App\Services\Application\　 $user
     * @return void
     */
    public function create($project_id,　$user): void;

    /**
     * @param UpdateUserAdminParameter $parameter
     */
    public function updateAdmin(UpdateUserAdminParameter $parameter): void;
}
