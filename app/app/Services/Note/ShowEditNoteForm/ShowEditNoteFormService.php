<?php


namespace App\Services\Note\ShowEditNoteForm;


use App\Models\Note;
use App\Services\Note\NoteRepositoryInterface;

class ShowEditNoteFormService
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
     * @param $note_id
     * @return Note
     */
    public function exec($note_id): Note
    {
        return $this->note_repository->findById($note_id);
    }
}
