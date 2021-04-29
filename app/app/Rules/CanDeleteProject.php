<?php

namespace App\Rules;

use App\Services\Project\ProjectRepositoryInterface;
use Illuminate\Contracts\Validation\Rule;

class CanDeleteProject implements Rule
{

    /**
     * @var
     */
    protected $project_id;

    /**
     * CanDeleteProject constructor.
     * @param $project_id
     */
    public function __construct($project_id)
    {
        $this->project_id = $project_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $project_repository = resolve(ProjectRepositoryInterface::class);
        $project_ids = array_column($project_repository->fetchAppAssignProjectId(),'project_id');
        return !in_array((int)$this->project_id, $project_ids);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return trans('validation.delete_project');
    }
}
