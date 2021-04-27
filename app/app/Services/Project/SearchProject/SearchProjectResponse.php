<?php

namespace App\Services\Project\SearchProject;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class SearchProjectResponse
 * @package App\Services\Project\SearchProject
 */
class SearchProjectResponse
{
    /**
     * @var Project[]|array|Collection
     */
    private $items = [];

    /**
     * @return Project[]|array|Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Project[]|array|\Illuminate\Support\Collection $items
     * @return SearchProjectResponse
     */
    public function setItems($items): SearchProjectResponse
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'items' => $this->items->toArray()
        ];
    }
}
