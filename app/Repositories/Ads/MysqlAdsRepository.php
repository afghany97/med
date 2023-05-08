<?php

namespace App\Repositories\Ads;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class MysqlAdsRepository implements AdsRepositoryInterface
{
    public function list(int $limit, int $page): LengthAwarePaginator
    {
        return DB::table('ads')
            ->select(['id', 'title', 'image'])
            ->paginate($limit, page: $page);
    }
}
