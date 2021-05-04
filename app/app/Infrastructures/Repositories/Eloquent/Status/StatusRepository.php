<?php


namespace App\Infrastructures\Repositories\Eloquent\Status;


use App\Models\Status;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use App\Services\Status\StatusRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StatusRepository implements StatusRepositoryInterface
{
    /**
     * {@inheritDoc}
     * @return Collection
     */
    public function all(): Collection
    {
        return Status::with('users')
            ->with('projects')
            ->orderBy('user_id')
            ->get();
    }

    /**
     * @param UpdateUserAdminParameter $parameter
     */
    public function updateAdmin(UpdateUserAdminParameter $parameter): void
    {
        if (!empty($parameter->getProjectStatusIds())) {
            foreach ($parameter->getProjectStatusIds() as $key => $project_id) {
                $status = Status::where('user_id', $parameter->getUserId())
                    ->where('project_id', $project_id)
                    ->firstOrFail();
                $status->status = $parameter->getStatuses()[$key];
                $status->save();
            }
        }
    }
}
