<?php


namespace App\Services\Note;


use App\Models\Note;
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
}
