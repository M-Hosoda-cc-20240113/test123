<?php

namespace App\Rules;

use App\Models\Project;
use Illuminate\Contracts\Validation\Rule;

class CanApply implements Rule
{

    /**
     * @var
     */
    protected $project_id;

    /**
     * Create a new rule instance.
     *
     * @param int $project_id
     */
    public function __construct(int $project_id)
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
        $project_ids = array_column($this->fetchCanApply()->toArray(),'id');
        return in_array((int)$this->project_id, $project_ids);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '予期せぬ値が入力されました。';
    }

    /**
     * @return \App\Models\Project[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    private function fetchCanApply()
    {
        return Project::where('decided',0)->select('id')->get();
    }

}
