<?php


namespace App\Infrastructures\Repositories\Eloquent\Status;


use App\Models\Status;
use App\Models\User;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use App\Services\Status\StatusRepositoryInterface;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;

class StatusRepository implements StatusRepositoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function all(): Collection
    {
        return Status::with('users')
            ->with('projects')
            ->orderBy('user_id')
            ->get();
    }

    /**
     * {@inheritDoc}
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

    /**
     * {@inheritDoc}
     * 0：未営業、1：面談待ち、2：結果待ち、3：稼働済み
     */
    public function fetchNotOpenUser(): Collection
    {
        $now = CarbonImmutable::now();
        $start_of_month = $now->startOfMonth();
        $end_of_month = $now->endOfMonth();
        return Status::whereIn('user_id', function ($query) use ($start_of_month, $end_of_month) {
            $query->from('users')
                ->select('id')
                ->whereBetween('operation_start_month', [$start_of_month, $end_of_month]);
        })->with('users')
            ->where('status', 0)
            ->get();
    }
}
