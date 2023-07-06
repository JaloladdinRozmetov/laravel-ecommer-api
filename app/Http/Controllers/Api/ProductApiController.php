<?php

namespace App\Http\Controllers\Api;

use App\DTO\ProductDTO;
use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = $this->productService->getAllProducts();

        return response()->json($products);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $productDTO = ProductDTO::fromRequest($request);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = Storage::disk('public')->put('products', $image);
            $productDTO->image = $path;
        }

        $product = $this->productService->createProduct($productDTO);

        return response()->json($product, 201);
    }

    /**
     * @param $productId
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($productId)
    {
        $product = $this->productService->getProductById($productId);

        return response()->json($product);
    }

    /**
     * @param Request $request
     * @param $productId
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $productId)
    {
        $productDTO = ProductDTO::fromRequest($request);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = Storage::disk('public')->put('products', $image);
            $productDTO->image = $path;
        }
        $product = $this->productService->updateProduct($productId, $productDTO);

        return response()->json($product);
    }

    /**
     * @param $productId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($productId)
    {
        $this->productService->deleteProduct($productId);

        return response()->json(['message' => 'Product deleted successfully']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $searchCriteria = $request->get('search'); // Retrieve the search criteria from the request

        $products = $this->productService->getProductsBySearch($searchCriteria);

        return response()->json($products);
    }

}
