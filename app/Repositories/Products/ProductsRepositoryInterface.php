<?php

namespace App\Repositories\Products;

use App\Filters\Products\ProductsFilters;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductsRepositoryInterface
{
    public function list(ProductsFilters $productsFilters, int $limit, int $page): LengthAwarePaginator;
}
