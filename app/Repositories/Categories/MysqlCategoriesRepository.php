<?php

namespace App\Repositories\Categories;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class MysqlCategoriesRepository implements CategoryRepositoryInterface
{
    public function list(int $limit, int $page): LengthAwarePaginator
    {
        return Category::query()
            ->select(['id', 'name'])
            ->paginate($limit, page: $page);
    }
}
