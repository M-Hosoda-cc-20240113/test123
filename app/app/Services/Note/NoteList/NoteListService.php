<?php


namespace App\Services\Note\NoteList;


use App\Services\Note\NoteRepositoryInterface;
use App\Services\Pagination\PaginatorService;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class NoteListService
 * @package App\Services\Note\NoteList
 */
class NoteListService
{
    /**
     * @var NoteRepositoryInterface
     */
    private $note_repository;

    /**
     * @var PaginatorService
     */
    private $paginator_service;

    /**
     * NoteListService constructor.
     * @param NoteRepositoryInterface $note_repository
     * @param PaginatorService $paginator_service
     */
    public function __construct(NoteRepositoryInterface $note_repository, PaginatorService $paginator_service)
    {
        $this->note_repository = $note_repository;
        $this->paginator_service = $paginator_service;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function exec(): LengthAwarePaginator
    {
        $notes = $this->note_repository->all();
        return$this->paginator_service->paginate($notes);
    }
}
