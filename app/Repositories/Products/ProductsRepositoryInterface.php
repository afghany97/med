<?php

namespace App\Repositories\Products;

use App\Utilities\Products\ProductsUtilities;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductsRepositoryInterface
{
    public function list(ProductsUtilities $productsFilters, int $limit, int $page): LengthAwarePaginator;
}
