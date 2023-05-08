<?php

namespace App\Http\Controllers;

use App\Actions\Ads\AdsListAction;
use App\enums\PaginationEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdsController
{
    public function list(Request $request, AdsListAction $adsListAction): JsonResponse
    {
        $ads = $adsListAction->execute(
            $request->get('limit', PaginationEnum::DEFAULT_LIMIT->value),
            $request->get('page', PaginationEnum::DEFAULT_PAGE->value)
        );
        $payload = [
            "data" => $ads->items(),
            "pagination" => [
                "hasMorePages" => $ads->hasMorePages()
            ]
        ];

        return response()->json($payload);
    }
}
