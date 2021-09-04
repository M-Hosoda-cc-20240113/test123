<?php

namespace App\Http\Requests\Admin\Note;

use Illuminate\Foundation\Http\FormRequest;

class CreateNoteRequest extends FormRequest
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
            'title'    => ['required', 'string', 'max:50'],
            'contents' => ['required', 'string', 'max:500'],
        ];
    }
}
