<?php

namespace App\Http\Requests\Admin\Note;

use App\Models\Note;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNoteRequest extends FormRequest
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
        $notes = Note::all();
        $note_ids = $notes->pluck('id')->toArray();
        return [
            'note_id' => ['required', 'int', Rule::in($note_ids)],
            'title' => ['required', 'string', 'max:50'],
            'contents' => ['required', 'string', 'max:500'],
        ];
    }
}
