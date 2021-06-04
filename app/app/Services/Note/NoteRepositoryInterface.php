<?php


namespace App\Services\Note;


use App\Models\Note;
use App\Services\Note\CreateNote\CreateNoteParameter;
use App\Services\Note\DeleteNote\DeleteNoteParameter;
use App\Services\Note\UpdateNote\UpdateNoteParameter;
use Illuminate\Database\Eloquent\Collection;

interface NoteRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param $note_id
     * @return Note
     */
    public function findById($note_id): Note;

    /**
     * @param CreateNoteParameter $parameter
     * @return Note
     */
    public function create(CreateNoteParameter $parameter): Note;

    /**
     * @param UpdateNoteParameter $parameter
     * @return Note
     */
    public function update(UpdateNoteParameter $parameter): Note;

    /**
     * @param DeleteNoteParameter $parameter
     */
    public function delete(DeleteNoteParameter $parameter): void;
}
