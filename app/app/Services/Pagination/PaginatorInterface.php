<?php


namespace App\Services\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Interface PaginatorInterface
 * @package App\Services\Pagination
 */
interface PaginatorInterface
{
    /**
     * @param Collection $items
     * @param int $per_page
     * @return LengthAwarePaginator
     */
    public function paginate(Collection $items, int $per_page): LengthAwarePaginator;
}
