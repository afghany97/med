<?php

namespace App\Actions\Products;

use App\Filters\Products\ProductsFilters;
use App\Repositories\Products\ProductsRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsListAction
{
    private ProductsRepositoryInterface $productsRepository;

    public function __construct(ProductsRepositoryInterface $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function execute(ProductsFilters $productsFilters, int $limit, int $page): LengthAwarePaginator
    {
        return $this->productsRepository->list($productsFilters, $limit, $page);
    }
}
