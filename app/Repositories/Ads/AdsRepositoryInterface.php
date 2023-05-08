<?php

namespace App\Repositories\Ads;

use Illuminate\Pagination\LengthAwarePaginator;

interface AdsRepositoryInterface
{
    public function list(int $limit, int $page): LengthAwarePaginator;
}
