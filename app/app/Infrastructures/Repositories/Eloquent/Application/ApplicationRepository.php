<?php

namespace App\Infrastructures\Repositories\Eloquent\Application;

use App\Models\Application;
use App\Models\Status;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use App\Services\Application\ApplicationRepositoryInterface;
use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class ApplicationRepository implements ApplicationRepositoryInterface
{
    /**
     * @inheritDoc
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
     */
    public function create($project_id, $user): void
    {
        $user->project_status()->syncWithoutDetaching($project_id);
        $user->project_app()->syncWithoutDetaching($project_id);
    }

    /**
     * @inheritDoc
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

    /**
     * @inheritDoc
     */
    public function fetchWithStatus(): Collection
    {
        $application_with_status = [];
        $applications = Application::with('users')
            ->with('projects')
            ->orderBy('user_id')
            ->get()
            ->toArray();
        $statuses = Status::whereNotIn('status', [3])
            ->orderBy('user_id')
            ->select('status')
            ->get()
            ->toArray();
        foreach ($applications as $key => $application) {
            $application_with_status[] = array_merge($application, $statuses[$key]);
        }
        return collect($application_with_status);
    }

    /**
     * @inheritDoc
     */
    public function interviewUserCounts(): int
    {
        $now = CarbonImmutable::now();
        $start_of_month = $now->startOfMonth();
        $end_of_month = $now->endOfMonth();
        return Application::whereBetween('interview_date',[$start_of_month,$end_of_month])->count();
    }
}
