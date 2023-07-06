<?php

namespace App\Http\Controllers\Api;

use App\DTO\CategoryDTO;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();

        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $categoryDTO = CategoryDTO::fromRequest($request);
        $category = $this->categoryService->createCategory($categoryDTO);

        return response()->json($category, 201);
    }

    public function show($categoryId)
    {
        $category = $this->categoryService->getCategoryById($categoryId);

        return response()->json($category);
    }

    public function update(Request $request, $categoryId)
    {
        $categoryDTO = CategoryDTO::fromRequest($request);
        $category = $this->categoryService->updateCategory($categoryId, $categoryDTO);

        return response()->json($category);
    }

    public function destroy($categoryId)
    {
        $category = $this->categoryService->deleteCategory($categoryId);

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
