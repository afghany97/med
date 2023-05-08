<?php

namespace App\Actions\Ads;

use App\Repositories\Ads\AdsRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class AdsListAction
{
    private AdsRepositoryInterface $adsRepository;

    public function __construct(AdsRepositoryInterface $adsRepository)
    {
        $this->adsRepository = $adsRepository;
    }

    public function execute(int $limit, int $page): LengthAwarePaginator
    {
        return $this->adsRepository->list($limit, $page);
    }
}
