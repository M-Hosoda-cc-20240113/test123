<?php


namespace App\Infrastructures\Repositories\Eloquent\Note;


use App\Models\Note;
use App\Services\Note\CreateNote\CreateNoteParameter;
use App\Services\Note\DeleteNote\DeleteNoteParameter;
use App\Services\Note\NoteRepositoryInterface;
use App\Services\Note\UpdateNote\UpdateNoteParameter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class NoteRepository implements NoteRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return Note::all();
    }

    /**
     * @inheritDoc
     */
    public function findById($note_id): Note
    {
        return Note::findOrFail($note_id);
    }

    /**
     * @inheritDoc
     */
    public function create(CreateNoteParameter $parameter): Note
    {
        $note = new Note();
        $note->title = $parameter->getTitle();
        $note->contents = $parameter->getContents();
        $note->save();
        return $note;
    }

    /**
     * @inheritDoc
     */
    public function update(UpdateNoteParameter $parameter): Note
    {
        $note = Note::findOrFail($parameter->getNoteId());
        $note->title = $parameter->getTitle();
        $note->contents = $parameter->getContents();
        $note->save();
        return $note;
    }

    /**
     * @inheritDoc
     */
    public function delete(DeleteNoteParameter $parameter): void
    {
        $note = Note::findOrFail($parameter->getNoteId());
        $note->delete();
    }
}
