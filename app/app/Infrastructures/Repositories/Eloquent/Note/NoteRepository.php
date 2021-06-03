<?php


namespace App\Infrastructures\Repositories\Eloquent\Note;


use App\Models\Note;
use App\Services\Note\NoteRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
    public function fetchById($note_id): Note
    {
        return Note::findOrFail($note_id);
    }
}
