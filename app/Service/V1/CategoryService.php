<?php

namespace App\Service\V1;

use App\Models\Category;
use App\Models\User;
use App\Repository\CategoryRepository;
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
