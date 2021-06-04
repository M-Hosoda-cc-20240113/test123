<?php


namespace App\Services\Note\ShowEditNoteForm;


use App\Models\Note;

class ShowEditNoteFormResponse
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
     * @return ShowEditNoteFormResponse
     */
    public function setNote(Note $note): ShowEditNoteFormResponse
    {
        $this->note = $note;
        return $this;
    }
}
