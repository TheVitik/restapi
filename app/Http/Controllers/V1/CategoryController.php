<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use App\Service\V1\CategoryService;
use App\Service\V1\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use function response;

class CategoryController extends Controller
{
    public function index(Request $request, CategoryService $service): JsonResponse
    {
        $categories = $service->getCategories($request);

        return response()->json($categories);
    }

    public function store(Request $request, CategoryService $service): JsonResponse
    {
        $category = $service->createCategory($request);

        return response()->json($category, 201);
    }
}
