<?php

namespace App\Actions\Products;

use App\Utilities\Products\ProductsUtilities;
use App\Repositories\Products\ProductsRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductsListAction
{
    private ProductsRepositoryInterface $productsRepository;

    public function __construct(ProductsRepositoryInterface $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function execute(ProductsUtilities $productsFilters, int $limit, int $page): LengthAwarePaginator
    {
        return $this->productsRepository->list($productsFilters, $limit, $page);
    }
}
