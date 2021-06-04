<?php


namespace App\Services\Note\UpdateNote;


class UpdateNoteParameter
{
    /**
     * @var int
     */
    private $note_id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $contents;

    /**
     * @return int
     */
    public function getNoteId(): int
    {
        return $this->note_id;
    }

    /**
     * @param int $note_id
     * @return UpdateNoteParameter
     */
    public function setNoteId(int $note_id): UpdateNoteParameter
    {
        $this->note_id = $note_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return UpdateNoteParameter
     */
    public function setTitle(string $title): UpdateNoteParameter
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        return $this->contents;
    }

    /**
     * @param string $contents
     * @return UpdateNoteParameter
     */
    public function setContents(string $contents): UpdateNoteParameter
    {
        $this->contents = $contents;
        return $this;
    }
}
