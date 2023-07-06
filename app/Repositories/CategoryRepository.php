<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function createCategory($categoryData)
    {
        $categoryArray = [
            'name' => $categoryData->name,
            'parent_id' => $categoryData->parent_id,
        ];

        return Category::create($categoryArray);
    }

    public function getCategoryById($categoryId)
    {
        return Category::findOrFail($categoryId);
    }

    public function updateCategory($categoryId, $categoryData)
    {
        $categoryArray = [
            'name' => $categoryData->name,
            'parent_id' => $categoryData->parent_id,
        ];

        $category = Category::findOrFail($categoryId);
        $category->update($categoryArray);

        return $category;
    }

    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        return $category;
    }
}
