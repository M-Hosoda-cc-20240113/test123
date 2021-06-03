<?php


namespace App\Services\Note\NoteDetail;


use App\Models\Note;
use App\Services\Note\NoteRepositoryInterface;

class NoteDetailService
{
    /**
     * @var NoteRepositoryInterface
     */
    private $note_repository;

    /**
     * NoteDetailService constructor.
     * @param \App\Services\Note\NoteRepositoryInterface $note_repository
     */
    public function __construct(NoteRepositoryInterface $note_repository)
    {
        $this->note_repository = $note_repository;
    }

    /**
     * @param int $note_id
     * @return Note
     */
    public function exec(int $note_id): Note
    {
        return $this->note_repository->fetchById($note_id);
    }
}
