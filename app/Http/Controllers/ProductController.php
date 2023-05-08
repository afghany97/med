<?php

namespace App\Http\Controllers;

use App\Actions\Products\ProductsListAction;
use App\enums\PaginationEnum;
use App\Utilities\Products\ProductsUtilities;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController
{
    public function list(Request $request, ProductsListAction $productsListAction, ProductsUtilities $productsFilters): JsonResponse
    {
        $products = $productsListAction->execute(
            $productsFilters,
            $request->get('limit', PaginationEnum::DEFAULT_LIMIT->value),
            $request->get('page', PaginationEnum::DEFAULT_PAGE->value)
        );
        $payload = [
            "data" => $products->items(),
            "pagination" => [
                "hasMorePages" => $products->hasMorePages()
            ]
        ];

        return response()->json($payload);
    }
}
