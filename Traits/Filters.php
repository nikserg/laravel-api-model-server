<?php

namespace nikserg\LaravelApiModelServer\Traits;

use Illuminate\Database\Eloquent\Model;

trait Filters
{

    private $query;

    /**
     * Установка поиска
     *
     * @param array|string|null $search
     * @param boolean $having
     * @return Model $model
     */
    public function setSearch(array|string|null $search = null, bool $having = false): Model
    {
        if (is_string($search)) {
            $search = json_decode($search, true);
        } else if (!$search) {
            return $this;
        }

        array_map(function ($params) use ($having) {

            if ($having) {
                $this->query->orHaving($params['column'], $params['operator'], $params['value']);
            } else {
                $this->query->orWhere($params['column'], $params['operator'], $params['value']);
            }

        }, $search);

        return $this;
    }
}
