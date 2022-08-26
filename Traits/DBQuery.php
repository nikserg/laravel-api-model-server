<?php 

namespace Traits;

trait DBQuery {

    private $query;

    public function appendQuery()
    {
        $this->query = $this->newModelQuery()->select();

        return $this;
    }

    public function setSort(string $column = 'id', string $direction = 'asc')
    {
        return $this->query->orderBy($column ?? 'id', $direction ?? 'asc');
    }

    public function closeQueryPaginate(?int $per_page = 15) // collection
    {
        return $this->query->paginate($per_page);
    }

    public function closeQueryGet() // collection
    {
        return $this->query->get();
    }
}