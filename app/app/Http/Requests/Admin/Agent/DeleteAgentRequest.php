<?php

namespace App\Http\Requests\Admin\Agent;

use App\Models\Agent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeleteAgentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $agents = Agent::all();
        $agent_ids = $agents->pluck('id')->toArray();
        return [
            'agent_id' => ['required', Rule::in($agent_ids)],
        ];
    }
}
