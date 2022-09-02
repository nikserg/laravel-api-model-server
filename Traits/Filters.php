<?php

namespace nikserg\LaravelApiModelServer\Traits;

trait Filters
{

    private $query;

    /**
     * Установка фильтра
     *
     * @param array|string|null $search
     * @param boolean $having
     * @return Builder $builder
     */
    public function setFilters(array|string $search = null, bool $having = false)
    {
        if (is_string($search)) {
            $search = json_decode($search, true);
        } else if (is_array($search)) {
            $search = $search;
        } else {
            return $this;
        }

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
