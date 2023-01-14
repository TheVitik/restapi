<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository
{
    /**
     * Create a new user
     *
     * @param Category $category
     */
    public function create(Category $category): Category
    {
        $categories = [];
        if (cache()->has('categories')) {
            $categories = cache()->get('categories');
        }
        $category->id = count($categories) + 1;
        $categories[] = $category;
        cache()->put('categories', $categories);

        return $category;
    }

    public function all()
    {
        return cache()->get('categories');
    }

}
