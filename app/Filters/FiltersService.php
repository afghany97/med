<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

abstract class FiltersService
{
    protected array $filters = [];

    final public function applyFilters(Builder|QueryBuilder $builder): Builder|QueryBuilder
    {
        foreach ($this->filters as $filter) {
            if (method_exists($this, $methodName = $this->filtersMapper[$filter] ?? $filter) && request()->filled($filter)) {
                $this->$methodName(request()->input($filter), $builder);
            }
        }
        return $builder;
    }
}
