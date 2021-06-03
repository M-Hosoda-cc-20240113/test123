<?php

namespace App\Http\Requests\Front;

use App\Models\Position;
use App\Models\Skill;
use App\Models\Station;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
        $skills = Skill::all();
        $skill_ids = $skills->pluck('id')->toArray();

        $positions = Position::all();
        $position_ids =$positions->pluck('id')->toArray();

        $stations = Station::all();
        $station_ids = $stations->pluck('id')->toArray();

        return [
            'keyword' => ['string', 'max:100'],
            'skill_ids.*' => ['int', Rule::in($skill_ids)],
            'position_ids.*' => ['int', Rule::in($position_ids)],
            'station_ids.*' => ['int', Rule::in($station_ids)]
        ];
    }
}
