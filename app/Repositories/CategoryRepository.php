<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategories()
    {
        return Category::all();
    }

    /**
     * @param $categoryData
     * @return mixed
     */
    public function createCategory($categoryData)
    {
        $categoryArray = [
            'name' => $categoryData->name,
            'parent_id' => $categoryData->parent_id,
        ];

        return Category::create($categoryArray);
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public function getCategoryById($categoryId)
    {
        return Category::findOrFail($categoryId);
    }

    /**
     * @param $categoryId
     * @param $categoryData
     * @return mixed
     */
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

    /**
     * @param $categoryId
     * @return mixed
     */
    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        return $category;
    }
}
