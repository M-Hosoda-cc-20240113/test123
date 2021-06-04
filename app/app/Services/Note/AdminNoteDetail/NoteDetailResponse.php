<?php


namespace App\Services\Note\AdminNoteDetail;


use App\Models\Note;

/**
 * Class NoteDetailResponse
 * @package App\Services\Note\AdminNoteDetail
 */
class NoteDetailResponse
{
    /**
     * @var Note
     */
    private $note;

    /**
     * @return Note
     */
    public function getNote(): Note
    {
        return $this->note;
    }

    /**
     * @param Note $note
     * @return NoteDetailResponse
     */
    public function setNote(Note $note): NoteDetailResponse
    {
        $this->note = $note;
        return $this;
    }
}
