<?php

namespace App\Repository\V1;

use App\Models\V1\Category;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

use function cache;

class CategoryRepository
{
    /**
     * Create a new category
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

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function all(): array
    {
        return cache()->get('categories');
    }

}
