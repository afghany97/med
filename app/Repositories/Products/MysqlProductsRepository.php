<?php

namespace App\Repositories\Products;

use App\Filters\Products\ProductsFilters;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class MysqlProductsRepository implements ProductsRepositoryInterface
{
    public function list(ProductsFilters $productsFilters, int $limit, int $page): LengthAwarePaginator
    {
        return $productsFilters->applyFilters(Product::query())
            ->select(['id', 'title', 'price', 'image'])
            ->paginate($limit, page: $page);
    }
}
