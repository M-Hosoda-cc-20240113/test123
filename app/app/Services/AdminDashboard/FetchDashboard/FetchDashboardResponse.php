<?php


namespace App\Services\AdminDashboard\FetchDashboard;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class FetchDashboardResponse
{
    /**
     * @var Collection|null
     */
    private $fetch_user_operation;

    /**
     * @var Collection|null
     */
    private $fetch_interview;

    /**
     * @var Collection|null
     */
    private $fetch_interviewed;


    /**
     * @var Collection|null
     */
    private $fetch_not_open;

    /**
     * @var Collection|null
     */
    private $fetch_assign_user;

    /**
     * @var Collection|null
     */
    private $fetch_new_assign_user;

    /**
     * @return Collection|null
     */
    public function getFetchUserOperation(): ?Collection
    {
        return $this->fetch_user_operation;
    }

    /**
     * @param Collection|null $fetch_user_operation
     * @return FetchDashboardResponse
     */
    public function setFetchUserOperation(?Collection $fetch_user_operation
    ): FetchDashboardResponse {
        $this->fetch_user_operation = $fetch_user_operation;
        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getFetchInterview(): ?Collection
    {
        return $this->fetch_interview;
    }

    /**
     * @param Collection|null $fetch_interview
     * @return FetchDashboardResponse
     */
    public function setFetchInterview(?Collection $fetch_interview
    ): FetchDashboardResponse {
        $this->fetch_interview = $fetch_interview;
        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection|null
     */
    public function getFetchNotOpen(): ?SupportCollection
    {
        return $this->fetch_not_open;
    }

    /**
     * @param \Illuminate\Support\Collection|null $fetch_not_open
     * @return FetchDashboardResponse
     */
    public function setFetchNotOpen(?SupportCollection $fetch_not_open): FetchDashboardResponse
    {
        $this->fetch_not_open = $fetch_not_open;
        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getFetchAssignUser(): ?Collection
    {
        return $this->fetch_assign_user;
    }

    /**
     * @param Collection|null $fetch_assign_user
     * @return FetchDashboardResponse
     */
    public function setFetchAssignUser(?Collection $fetch_assign_user
    ): FetchDashboardResponse {
        $this->fetch_assign_user = $fetch_assign_user;
        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getFetchNewAssignUser(): ?Collection
    {
        return $this->fetch_new_assign_user;
    }

    /**
     * @param Collection|null $fetch_new_assign_user
     * @return FetchDashboardResponse
     */
    public function setFetchNewAssignUser(?Collection $fetch_new_assign_user
    ): FetchDashboardResponse {
        $this->fetch_new_assign_user = $fetch_new_assign_user;
        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection|null
     */
    public function getFetchInterviewed(): ?SupportCollection
    {
        return $this->fetch_interviewed;
    }

    /**
     * @param \Illuminate\Support\Collection|null $fetch_interviewed
     * @return FetchDashboardResponse
     */
    public function setFetchInterviewed(?SupportCollection $fetch_interviewed): FetchDashboardResponse
    {
        $this->fetch_interviewed = $fetch_interviewed;
        return $this;
    }
}
