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
     * @return Collection
     */
    public function all(): Collection
    {
        return Application::with('users')
            ->with('projects')
            ->orderBy('user_id')
            ->get();
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
