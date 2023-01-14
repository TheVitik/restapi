<?php

namespace App\Contracts;

use App\Models\Category;

interface CategoryRepository
{
    function create(Category $category): Category;

    function all();
}
