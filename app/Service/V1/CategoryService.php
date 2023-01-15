<?php

namespace App\Service\V1;

use App\Models\V1\Category;
use App\Repository\Cache\CacheCategoryRepository;
use Illuminate\Http\Request;

class CategoryService
{
    private CacheCategoryRepository $repository;

    function __construct(CacheCategoryRepository $repository)
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
