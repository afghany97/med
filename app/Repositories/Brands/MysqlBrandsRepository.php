<?php

namespace App\Repositories\Brands;

use App\Models\Brand;
use Illuminate\Pagination\LengthAwarePaginator;

class MysqlBrandsRepository implements BrandsRepositoryInterface
{
    public function list(int $limit, int $page): LengthAwarePaginator
    {
        return Brand::query()
            ->select(['id', 'name', 'image'])
            ->paginate($limit, page: $page);
    }
}
