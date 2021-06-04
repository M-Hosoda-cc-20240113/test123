<?php


namespace App\Services\Note\NoteList;


use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class NoteListResponse
 * @package App\Services\Note\NoteList
 */
class NoteListResponse
{
    /**
     * @var LengthAwarePaginator
     */
    private $notes;

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getNotes(): LengthAwarePaginator
    {
        return $this->notes;
    }

    /**
     * @param \Illuminate\Pagination\LengthAwarePaginator $notes
     * @return NoteListResponse
     */
    public function setNotes(LengthAwarePaginator $notes): NoteListResponse
    {
        $this->notes = $notes;
        return $this;
    }
}
