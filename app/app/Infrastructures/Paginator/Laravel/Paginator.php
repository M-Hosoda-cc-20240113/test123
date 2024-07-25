<?php


namespace App\Infrastructures\Paginator\Laravel;


use App\Services\Pagination\PaginatorInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator as LaravelPaginator;
use Illuminate\Support\Collection;

/**
 * Class Paginator
 * @package App\Infrastructures\Paginator\Laravel
 */
class Paginator implements PaginatorInterface
{
    /**
     * {@inheritDoc}
     */
    public function paginate(Collection $items, int $per_page): LengthAwarePaginator
    {
        $page_start = request('page', 1);
        $off_set = ($page_start * $per_page) - $per_page;
        $item_for_current_page = $items->slice($off_set, $per_page);

        return new LengthAwarePaginator(
            $item_for_current_page,
            $items->count(),
            $per_page,
            LaravelPaginator::resolveCurrentPage(),
            ['path' => LaravelPaginator::resolveCurrentPath()]
        );
    }
}
