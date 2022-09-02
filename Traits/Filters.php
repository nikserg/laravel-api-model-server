<?php

namespace nikserg\LaravelApiModelServer\Traits;

trait Filters {

    private $query;

    public function setFilters(?string $search = null, bool $having = false)
    {
        if (!$search || !is_string($search))
            return $this;

        array_map(function ($params) use ($having) {

            if ($having) {
                $this->query->orHaving($params['column'], $params['operator'], $params['value']);
            } else {
                $this->query->orWhere($params['column'], $params['operator'], $params['value']);
            }

        }, json_decode($search, true));

        return $this;
    }
}
