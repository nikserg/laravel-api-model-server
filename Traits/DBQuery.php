<?php

namespace nikserg\LaravelApiModelServer\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

trait DBQuery {

    private $query;

    /**
     * New query
     *
     * @return Builder
     */
    public function appendQuery(): Builder
    {
        $this->query = $this->newModelQuery()->select();

        return $this;
    }

    /**
     * Set sort
     *
     * @param string|null $column
     * @param string|null $direction
     * @return Builder
     */
    public function setSort(?string $column = 'id', ?string $direction = 'asc'): Builder
    {
        $this->query->orderBy($column ?? 'id', $direction ?? 'asc');

        return $this;
    }

    /**
     * close builder
     *
     * @param integer|null $per_page
     * @return LengthAwarePaginator
     */
    public function closeQueryPaginate(?int $per_page = 15): LengthAwarePaginator
    {
        return $this->query->paginate($per_page);
    }

    /**
     * Close builder
     *
     * @return Collection
     */
    public function closeQueryGet(): Collection
    {
        return $this->query->get();
    }
}
