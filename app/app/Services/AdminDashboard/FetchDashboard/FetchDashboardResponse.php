<?php


namespace App\Services\AdminDashboard\FetchDashboard;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class FetchDashboardResponse
{
    /**
     * @var Collection|null
     */
    private $users_by_operation_month;

    /**
     * @var Collection|null
     */
    private $users_by_interview_month;

    /**
     * @var Collection|null
     */
    private $interviewed_users;

    /**
     * @var Collection|null
     */
    private $not_open_users;

    /**
     * @var Collection|null
     */
    private $assign_users;

    /**
     * @var Collection|null
     */
    private $new_assign_users;

    /**
     * @var Collection|null
     */
    private $assign_fin_users;

    /**
     * @return Collection|null
     */
    public function getUsersByOperationMonth(): ?Collection
    {
        return $this->users_by_operation_month;
    }

    /**
     * @param SupportCollection|null $users_by_operation_month
     * @return FetchDashboardResponse
     */
    public function setUsersByOperationMonth(?SupportCollection $users_by_operation_month
    ): FetchDashboardResponse {
        $this->users_by_operation_month = $users_by_operation_month;
        return $this;
    }

    /**
     * @return SupportCollection|null
     */
    public function getUsersByInterviewMonth(): ?SupportCollection
    {
        return $this->users_by_interview_month;
    }

    /**
     * @param SupportCollection|null $users_by_interview_month
     * @return FetchDashboardResponse
     */
    public function setUsersByInterviewMonth(?SupportCollection $users_by_interview_month
    ): FetchDashboardResponse {
        $this->users_by_interview_month = $users_by_interview_month;
        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection|null
     */
    public function getNotOpenUsers(): ?SupportCollection
    {
        return $this->not_open_users;
    }

    /**
     * @param \Illuminate\Support\Collection|null $not_open_users
     * @return FetchDashboardResponse
     */
    public function setNotOpenUsers(?SupportCollection $not_open_users): FetchDashboardResponse
    {
        $this->not_open_users = $not_open_users;
        return $this;
    }

    /**
     * @return SupportCollection|null
     */
    public function getAssignUsers(): ?SupportCollection
    {
        return $this->assign_users;
    }

    /**
     * @param SupportCollection|null $assign_users
     * @return FetchDashboardResponse
     */
    public function setAssignUsers(?SupportCollection $assign_users
    ): FetchDashboardResponse {
        $this->assign_users = $assign_users;
        return $this;
    }

    /**
     * @return Collection|null
     */
    public function getNewAssignUsers(): ?Collection
    {
        return $this->new_assign_users;
    }

    /**
     * @param SupportCollection|null $new_assign_users
     * @return FetchDashboardResponse
     */
    public function setNewAssignUsers(?SupportCollection $new_assign_users
    ): FetchDashboardResponse {
        $this->new_assign_users = $new_assign_users;
        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection|null
     */
    public function getInterviewedUsers(): ?SupportCollection
    {
        return $this->interviewed_users;
    }

    /**
     * @param \Illuminate\Support\Collection|null $interviewed_users
     * @return FetchDashboardResponse
     */
    public function setInterviewedUsers(?SupportCollection $interviewed_users): FetchDashboardResponse
    {
        $this->interviewed_users = $interviewed_users;
        return $this;
    }

    /**
     * @return SupportCollection|null
     */
    public function getAssignFinUsers(): ?SupportCollection
    {
        return $this->assign_fin_users;
    }

    /**
     * @param SupportCollection|null $assign_fin_users
     * @return FetchDashboardResponse
     */
    public function setAssignFinUsers(?SupportCollection $assign_fin_users): FetchDashboardResponse
    {
        $this->assign_fin_users = $assign_fin_users;
        return $this;
    }
}
