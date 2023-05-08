<?php

namespace App\Actions\Brands;

use App\Repositories\Brands\BrandsRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class BrandsListAction
{
    private BrandsRepositoryInterface $brandsRepository;

    public function __construct(BrandsRepositoryInterface $brandsRepository)
    {
        $this->brandsRepository = $brandsRepository;
    }

    public function execute(int $limit, int $page): LengthAwarePaginator
    {
        return $this->brandsRepository->list($limit, $page);
    }
}
