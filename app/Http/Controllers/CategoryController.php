<?php

namespace App\Http\Controllers;

use App\Actions\Categories\CategoriesListAction;
use App\enums\PaginationEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController
{
    public function list(Request $request, CategoriesListAction $categoriesListAction): JsonResponse
    {
        $categories = $categoriesListAction->execute(
            $request->get('limit', PaginationEnum::DEFAULT_LIMIT->value),
            $request->get('page', PaginationEnum::DEFAULT_PAGE->value)
        );
        $payload = [
            "data" => $categories->items(),
            "pagination" => [
                "hasMorePages" => $categories->hasMorePages()
            ]
        ];

        return response()->json($payload);
    }
}
