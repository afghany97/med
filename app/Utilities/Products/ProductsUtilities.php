<?php

namespace App\Utilities\Products;

use App\Utilities\UtilitiesService;

class ProductsUtilities extends UtilitiesService
{
    protected array $availableFilters = [
        'category'
    ];

    protected array $availableSorts = [
        'views'
    ];

    public function category(int $categoryId, $builder)
    {
        $builder->where('category_id', '=', $categoryId);
    }

    public function views(string $direction, $builder)
    {
        $builder->orderBy('total_views', $direction);
    }
}
