<?php

namespace App\Repositories\Products;

use App\Utilities\Products\ProductsUtilities;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class MysqlProductsRepository implements ProductsRepositoryInterface
{
    public function list(ProductsUtilities $productsFilters, int $limit, int $page): LengthAwarePaginator
    {
        $query = Product::query();
        $productsFilters->applyFilters($query)
            ->applySorts($query);

        return $query->select(['id', 'title', 'price', 'image'])
            ->paginate($limit, page: $page);
    }
}
