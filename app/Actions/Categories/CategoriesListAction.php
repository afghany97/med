<?php

namespace App\Actions\Categories;

use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoriesListAction
{

    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function execute(int $limit, int $page): LengthAwarePaginator
    {
        return $this->categoryRepository->list($limit, $page);
    }
}
