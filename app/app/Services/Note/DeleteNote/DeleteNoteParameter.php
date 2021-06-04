<?php


namespace App\Services\Note\DeleteNote;


/**
 * Class DeleteNoteParameter
 * @package App\Services\Note\DeleteNote
 */
class DeleteNoteParameter
{
    /**
     * @var int
     */
    private $note_id;

    /**
     * @return int
     */
    public function getNoteId(): int
    {
        return $this->note_id;
    }

    /**
     * @param int $note_id
     * @return DeleteNoteParameter
     */
    public function setNoteId(int $note_id): DeleteNoteParameter
    {
        $this->note_id = $note_id;
        return $this;
    }
}
