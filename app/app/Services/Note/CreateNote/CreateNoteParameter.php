<?php


namespace App\Services\Note\CreateNote;


class CreateNoteParameter
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $contents;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return CreateNoteParameter
     */
    public function setTitle(string $title): CreateNoteParameter
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
     * @return CreateNoteParameter
     */
    public function setContents(string $contents): CreateNoteParameter
    {
        $this->contents = $contents;
        return $this;
    }
}
