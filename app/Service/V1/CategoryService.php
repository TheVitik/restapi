<?php

namespace App\Service\V1;

use App\Models\V1\Category;
use App\Repository\V1\CategoryRepository;
use Illuminate\Http\Request;

class CategoryService
{
    private CategoryRepository $repository;

    function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCategories(Request $request): array
    {
        return $this->repository->all();
    }

    public function createCategory(Request $request): Category
    {
        $category = new Category($request->all());

        return $this->repository->create($category);
    }

}
