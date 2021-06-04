<?php

namespace App\Http\Requests\admin\Note;

use App\Models\Note;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeleteNoteRequest extends FormRequest
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
        $notes = Note::all();
        $note_ids = $notes->pluck('id')->toArray();
        return [
            'note_id' => ['required', 'int', Rule::in($note_ids)],
        ];
    }
}
