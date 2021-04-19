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
    public function all();

    /**
     * 案件応募
     * @return Application
     *
     */
    public function create($id,$user);
}
