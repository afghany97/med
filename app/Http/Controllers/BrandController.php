<?php

namespace App\Http\Controllers;

use App\Actions\Brands\BrandsListAction;
use App\enums\PaginationEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BrandController
{
    public function list(Request $request, BrandsListAction $adsListAction): JsonResponse
    {
        $brands = $adsListAction->execute(
            $request->get('limit', PaginationEnum::DEFAULT_LIMIT->value),
            $request->get('page', PaginationEnum::DEFAULT_PAGE->value)
        );
        $payload = [
            "data" => $brands->items(),
            "pagination" => [
                "hasMorePages" => $brands->hasMorePages()
            ]
        ];

        return response()->json($payload);
    }
}
