<?php

namespace App\Infrastructures\Repositories\Eloquent\Application;

use App\Models\Application;
use App\Models\Status;
use App\Models\User;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
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
        $user->project_status()->syncWithoutDetaching($project_id);
        $user->project_app()->syncWithoutDetaching($project_id);
    }

    /**
     * @inheritDoc
     * @param UpdateUserAdminParameter $parameter
     */
    public function updateAdmin(UpdateUserAdminParameter $parameter): void
    {
        if (!empty($parameter->getProjectInterviewIds())) {
            foreach ($parameter->getProjectInterviewIds() as $key => $project_id) {
                $application = Application::where('user_id', $parameter->getUserId())
                    ->where('project_id', $project_id)
                    ->firstOrFail();
                $application->interview_date = $parameter->getInterviewDate()[$key] ?? null;
                $application->save();
            }
        }
    }
}
