<?php

namespace App\Utilities\Products;

use App\Utilities\UtilitiesService;

class ProductsUtilities extends UtilitiesService
{
    protected array $availableFilters = [
        'category',
        'tag'
    ];

    protected array $availableSorts = [
        'views',
        'creation'
    ];

    public function category(int $categoryId, $builder)
    {
        $builder->where('category_id', '=', $categoryId);
    }

    public function tag(string $tag, $builder)
    {
        $builder->where('tag', '=', $tag);
    }

    public function views(string $direction, $builder)
    {
        $builder->orderBy('total_views', $direction);
    }

    public function creation(string $direction, $builder)
    {
        $builder->orderBy('created_at', $direction);
    }
}
