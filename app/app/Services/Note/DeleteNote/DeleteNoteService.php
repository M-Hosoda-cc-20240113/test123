<?php


namespace App\Services\Note\DeleteNote;


use App\Services\Note\NoteRepositoryInterface;

/**
 * Class DeleteNoteService
 * @package App\Services\Note\DeleteNote
 */
class DeleteNoteService
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
     * @param DeleteNoteParameter $parameter
     */
    public function exec(DeleteNoteParameter $parameter): void
    {
        $this->note_repository->delete($parameter);
    }
}
