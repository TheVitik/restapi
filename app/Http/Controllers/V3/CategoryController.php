<?php

namespace App\Http\Controllers\V3;

use App\Http\Controllers\Controller;
use App\Http\Requests\V2\CreateCategoryRequest;
use App\Service\V2\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use function response;

class CategoryController extends Controller
{
    public function index(Request $request, CategoryService $service): JsonResponse
    {
        try {
            $categories = $service->getCategories($request);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to get categories',
            ], 500);
        }

        return response()->json($categories);
    }

    public function store(CreateCategoryRequest $request, CategoryService $service): JsonResponse
    {
        try {
            $category = $service->createCategory($request);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to create a category',
            ], 500);
        }

        return response()->json($category, 201);
    }
}
