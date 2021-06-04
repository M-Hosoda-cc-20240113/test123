<?php


namespace App\Services\Note\CreateNote;


use App\Models\Note;
use App\Services\Note\NoteRepositoryInterface;

/**
 * Class CreateNoteService
 * @package App\Services\Note\CreateNote
 */
class CreateNoteService
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
     * @param CreateNoteParameter $parameter
     * @return Note
     */
    public function exec(CreateNoteParameter $parameter): Note
    {
        return $this->note_repository->create($parameter);
    }
}
