<?php


namespace App\Services\Note\NoteDetail;


use App\Models\Note;

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
