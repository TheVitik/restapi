<?php

namespace App\Repository\Database;

use App\Models\V2\Category;
use Illuminate\Database\Eloquent\Collection;
use Throwable;

class DatabaseCategoryRepository
{
    /**
     * Create a new category
     *
     * @throws Throwable
     */
    public function create(Category $category): Category
    {
        $category->saveOrFail();

        return $category;
    }

    /**
     * Find user by id
     *
     * @throws Throwable
     */
    public function findById(int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function all(): Collection
    {
        return Category::all();
    }

}
