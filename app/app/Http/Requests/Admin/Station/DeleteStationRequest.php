<?php

namespace App\Http\Requests\Admin\Station;

use App\Models\Station;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeleteStationRequest extends FormRequest
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
        $stations = Station::all();
        $station_ids = $stations->pluck('id')->toArray();
        return [
            'station_id' => ['required', Rule::in($station_ids)],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'station_id.required' => '駅が取得できません。',
        ];
    }
}
