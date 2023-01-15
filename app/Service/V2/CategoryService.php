<?php

namespace App\Service\V2;

use App\Models\V2\Category;
use App\Repository\Database\DatabaseCategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CategoryService
{
    private DatabaseCategoryRepository $repository;

    function __construct(DatabaseCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCategories(Request $request): Collection
    {
        return $this->repository->all();
    }

    public function createCategory(Request $request): Category
    {
        $category = new Category($request->all());

        return $this->repository->create($category);
    }

}
