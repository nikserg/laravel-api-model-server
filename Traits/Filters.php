<?php 

namespace Traits;

trait Filters {

    private $query;

    public function setFilters(?string $search = null)
    {
        if (!$search || !is_string($search))
            return $this;

        array_map(function ($params) {

            $this->query->orWhere($params['column'], $params['operator'], $params['value']);

        }, json_decode($search, true));

        return $this;
    }
}