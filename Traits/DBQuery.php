<?php

namespace nikserg\LaravelApiModelServer\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;

trait DBQuery {

    private $query;

    /**
     * New query
     *
     * @return Model
     */
    public function appendQuery(): Model
    {
        $this->query = $this->newModelQuery()->select();

        return $this;
    }

    /**
     * Set sort
     *
     * @param string|null $column
     * @param string|null $direction
     * @return Model
     */
    public function setSort(?string $column = 'id', ?string $direction = 'asc'): Model
    {
        $this->query->orderBy($column ?? 'id', $direction ?? 'asc');

        return $this;
    }

    /**
     * return builder
     *
     * @return Builder
     */
    public function getQuery(): Builder
    {
        return $this->query;
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
