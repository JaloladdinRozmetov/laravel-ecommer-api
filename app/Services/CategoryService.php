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

    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function createCategory($categoryData)
    {
        return $this->categoryRepository->createCategory($categoryData);
    }

    public function getCategoryById($categoryId)
    {
        return $this->categoryRepository->getCategoryById($categoryId);
    }

    public function updateCategory($categoryId, $categoryData)
    {
        return $this->categoryRepository->updateCategory($categoryId, $categoryData);
    }

    public function deleteCategory($categoryId)
    {
        return $this->categoryRepository->deleteCategory($categoryId);
    }
}
