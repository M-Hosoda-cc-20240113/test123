<?php

namespace App\Services\Application;

use App\Models\Application;

interface ApplicationRepositoryInterface
{
    /**
     * 申し込み状況情報
     * @return Application
     *
     */
    public function all(): Application;

    /**
     * 案件応募
     * @param $project_id
     * @param \App\Services\Application\　 $user
     * @return void
     */
    public function create($project_id,　$user): void;
}
