<?php


namespace App\Infrastructures\Repositories\Eloquent\Status;


use App\Models\Status;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use App\Services\Status\StatusRepositoryInterface;

class StatusRepository implements StatusRepositoryInterface
{
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
