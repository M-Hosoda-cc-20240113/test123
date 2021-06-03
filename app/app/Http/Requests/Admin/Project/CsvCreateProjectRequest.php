<?php

namespace App\Http\Requests\Admin\Project;

use App\Models\Agent;
use App\Models\Position;
use App\Models\Skill;
use App\Models\Station;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use SplFileObject;

class CsvCreateProjectRequest extends FormRequest
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
        $skills = Skill::all();
        $skill_ids = $skills->pluck('id')->toArray();
        $positions = Position::all();
        $position_id = $positions->pluck('id')->toArray();

        $agents = Agent::all();
        $agent_ids = $agents->pluck('id')->toArray();
        $stations = Station::all();
        $station_ids = $stations->pluck('id')->toArray();

        return [
            'csv_file' => ['required', 'file', 'mimetypes:text/plain', 'mimes:csv,txt'],
            'csv_array' => ['required', 'array'],
            'csv_array.*.name' => ['required', 'unique:projects', 'string'],
            'csv_array.*.agent_id' => ['nullable', 'integer', Rule::in($agent_ids)],
            'csv_array.*.station_id' => ['required', 'integer', Rule::in($station_ids)],
            'csv_array.*.min_unit_price' => ['nullable', 'integer'],
            'csv_array.*.max_unit_price' => ['nullable', 'integer'],
            'csv_array.*.min_operation_time' => ['nullable', 'integer'],
            'csv_array.*.max_operation_time' => ['nullable', 'integer'],
            'csv_array.*.description' => ['required', 'string', 'max:500'],
            'csv_array.*.required_condition' => ['nullable', 'string', 'max:500'],
            'csv_array.*.better_condition' => ['nullable', 'string', 'max:500'],
            'csv_array.*.work_start' => ['nullable', 'string', 'max:5'],
            'csv_array.*.work_end' => ['nullable', 'string', 'max:5'],
            'csv_array.*.weekly_attendance' => ['nullable', 'integer', 'max:5'],
            'csv_array.*.feature' => ['nullable', 'string', 'max:500'],
            'csv_array.*.skill_ids' => ['required', 'array', 'max:10'],
            'csv_array.*.skill_ids.*' => ['required', 'integer', Rule::in($skill_ids)],
            'csv_array.*.position_ids' => ['required', 'array', 'max:10'],
            'csv_array.*.position_ids.*' => ['nullable', 'integer', Rule::in($position_id)],
        ];
    }

    protected function prepareForValidation()
    {
        $file_path = $this->file('csv_file')->path();
        // CSV取得
        $file = new SplFileObject($file_path);
        $file->setFlags(
            SplFileObject::READ_CSV |   // CSVとして行を読み込み
            SplFileObject::READ_AHEAD |       // 先読み／巻き戻しで読み込み
            SplFileObject::SKIP_EMPTY |       // 空行を読み飛ばす
            SplFileObject::DROP_NEW_LINE      // 行末の改行を読み飛ばす
        );
        foreach ($file as $index => $line) {
            // ヘッダーを取得
            if (empty($header)) {
                $header = $line;
                continue;
            }
            $csv_array[$index]['agent_id'] = (int)$line[0] === 0 ? null : (int)$line[0];
            $csv_array[$index]['station_id'] = (int)$line[1];
            $csv_array[$index]['name'] = $line[2];
            $csv_array[$index]['min_unit_price'] = (int)$line[3] === 0 ? null : (int)$line[3];
            $csv_array[$index]['max_unit_price'] = (int)$line[4] === 0 ? null : (int)$line[4];
            $csv_array[$index]['min_operation_time'] = (int)$line[5] === 0 ? null : (int)$line[5];
            $csv_array[$index]['max_operation_time'] = (int)$line[6] === 0 ? null : (int)$line[6];
            $csv_array[$index]['description'] = $line[7] == "" ? null : $line[7];
            $csv_array[$index]['required_condition'] = $line[8] == "" ? null : $line[8];
            $csv_array[$index]['better_condition'] = $line[9] == "" ? null : $line[9];
            $csv_array[$index]['work_start'] = $line[10] == "" ? null : $line[10];
            $csv_array[$index]['work_end'] = $line[11] == "" ? null : $line[11];
            $csv_array[$index]['weekly_attendance'] = (int)$line[12] === 0 ? null : (int)$line[12];
            $csv_array[$index]['feature'] = $line[13] == "" ? null : $line[13];
            $csv_array[$index]['skill_ids'] = explode(',', $line[14]);
            $csv_array[$index]['position_ids'] = explode(',', $line[15]);
        }
        $this->merge([
            'csv_array' => $csv_array,
        ]);
    }
}
