<?php


namespace App\Services\Note\UpdateNote;


use App\Models\Note;
use App\Services\Note\NoteRepositoryInterface;

/**
 * Class UpdateNoteService
 * @package App\Services\Note\UpdateNote
 */
class UpdateNoteService
{
    /**
     * @var NoteRepositoryInterface
     */
    private $note_repository;

    /**
     * CreateNoteService constructor.
     * @param \App\Services\Note\NoteRepositoryInterface $note_repository
     */
    public function __construct(NoteRepositoryInterface $note_repository)
    {
        $this->note_repository = $note_repository;
    }

    /**
     * @param UpdateNoteParameter $parameter
     * @return Note
     */
    public function exec(UpdateNoteParameter $parameter): Note
    {
        return $this->note_repository->update($parameter);
    }
}
