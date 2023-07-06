<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return \App\Models\Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

    /**
     * @param $categoryData
     * @return mixed
     */
    public function createCategory($categoryData)
    {
        return $this->categoryRepository->createCategory($categoryData);
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public function getCategoryById($categoryId)
    {
        return $this->categoryRepository->getCategoryById($categoryId);
    }

    /**
     * @param $categoryId
     * @param $categoryData
     * @return mixed
     */
    public function updateCategory($categoryId, $categoryData)
    {
        return $this->categoryRepository->updateCategory($categoryId, $categoryData);
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public function deleteCategory($categoryId)
    {
        return $this->categoryRepository->deleteCategory($categoryId);
    }
}
