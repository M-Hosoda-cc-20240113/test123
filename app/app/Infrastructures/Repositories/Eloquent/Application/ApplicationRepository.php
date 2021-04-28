<?php

namespace App\Infrastructures\Repositories\Eloquent\Application;

use App\Models\Application;
use App\Models\User;
use App\Services\Application\ApplicationRepositoryInterface;
use Illuminate\Support\Collection;

class ApplicationRepository implements ApplicationRepositoryInterface
{
    /**
     * @inheritDoc
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection
    {
        return User::with('project_app')
            ->whereHas('project_app', function ($q) {
                $q->whereExists(function ($q) {
                    return $q;
                });
            })->get();
    }

    /**
     * @inheritDoc
     * @param $project_id
     * @param $user
     * @return void
     */
    public function create($project_id, $user): void
    {
        $user->project_app()->syncWithoutDetaching($project_id);
    }
}
