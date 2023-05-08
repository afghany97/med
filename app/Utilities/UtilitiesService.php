<?php

namespace App\Utilities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

abstract class UtilitiesService
{
    protected array $availableFilters = [];

    protected array $availableSorts = [];

    final public function applyFilters(Builder|QueryBuilder &$builder): UtilitiesService
    {
        foreach ($this->availableFilters as $filter) {
            if (method_exists($this, $filter) && request()->filled($filter)) {
                $this->$filter(request()->input($filter), $builder);
            }
        }
        return $this;
    }

    final public function applySorts(Builder|QueryBuilder &$builder): UtilitiesService
    {
        $requestSorts = array_combine(
            array_column(request()->get('sorts', []), 'name'),
            request()->get('sorts', [])
        );

        if (empty($requestSorts)) return $this;

        foreach ($this->availableSorts as $sort) {
            if (method_exists($this, $sort) && isset($requestSorts[$sort])) {
                $this->$sort($requestSorts[$sort]['direction'] ?? 'DESC', $builder);
            }
        }
        return $this;
    }
}
