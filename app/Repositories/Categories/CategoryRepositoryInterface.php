<?php

namespace App\Repositories\Categories;
use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryRepositoryInterface
{
    public function list(int $limit, int $page): LengthAwarePaginator;
}
