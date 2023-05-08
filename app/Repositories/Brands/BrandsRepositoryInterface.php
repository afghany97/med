<?php

namespace App\Repositories\Brands;

use Illuminate\Pagination\LengthAwarePaginator;

interface BrandsRepositoryInterface
{
    public function list(int $limit, int $page): LengthAwarePaginator;
}
