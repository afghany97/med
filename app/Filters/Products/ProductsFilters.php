<?php

namespace App\Filters\Products;

use App\Filters\FiltersService;

class ProductsFilters extends FiltersService
{
    protected array $filters = [
        'tag'
    ];

    public function tag(string $tag, $builder)
    {
        $builder->where('tag', '=', $tag);
    }
}
