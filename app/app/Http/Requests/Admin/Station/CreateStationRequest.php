<?php

namespace App\Http\Requests\Admin\Station;

use Illuminate\Foundation\Http\FormRequest;

class CreateStationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required','string','max:20','unique:stations'],
            'area_name' => ['required','string','max:20'],
        ];
    }

    public function messages()
    {
        return [
          'name.required'      => '駅名を入力してください。',
          'name.string'        => '駅名：予期せぬ値が入力されました。',
          'name.max'           => '駅名が長すぎます。',
          'name.unique'        => 'すでに登録済みの駅名です。',
          'area_name.required' => 'エリア名を入力してください',
          'area_name.string'   => 'エリア：予期せぬ値が入力されました。',
          'area_name.max'      => 'エリア名が長すぎます。',
        ];
    }
}
