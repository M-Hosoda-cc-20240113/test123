<?php


namespace App\Services\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class PaginatorService
 * @package App\Services\Pagination
 */
class PaginatorService
{
    /**
     * int 1ページの表示件数(デフォルト)
     */
    const PER_PAGE = 100;

    /**
     * @var PaginatorInterface
     */
    private $paginator;

    /**
     * PaginatorService constructor.
     * @param PaginatorInterface $paginator
     */
    public function __construct(PaginatorInterface $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * @param \Illuminate\Support\Collection $items
     * @param int $per_page
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(Collection $items, int $per_page = self::PER_PAGE): LengthAwarePaginator
    {
        return $this->paginator->paginate($items, $per_page);
    }
}
