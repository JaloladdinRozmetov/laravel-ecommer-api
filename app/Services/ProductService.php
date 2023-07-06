<?php

namespace App\Services;

use App\Models\Product;
use App\DTO\ProductDTO;
use App\Repositories\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    /**
     * @param ProductDTO $productDTO
     * @return mixed
     */
    public function createProduct(ProductDTO $productDTO)
    {
        $productData = [
            'product_name' => $productDTO->product_name,
            'price' => $productDTO->price,
            'description' => $productDTO->description,
            'image' => $productDTO->image,
            'status' => $productDTO->status,
            'category_id' => $productDTO->category_id,
        ];
        return $this->productRepository->createProduct($productData);
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function getProductById($productId)
    {
        return $this->productRepository->getProductById($productId);
    }

    /**
     * @param $productId
     * @param ProductDTO $productDTO
     * @return mixed
     */
    public function updateProduct($productId, ProductDTO $productDTO)
    {
        $productData = [
            'product_name' => $productDTO->product_name,
            'price' => $productDTO->price,
            'description' => $productDTO->description,
            'image' => $productDTO->image,
            'status' => $productDTO->status,
            'category_id' => $productDTO->category_id,
        ];
        return $this->productRepository->updateProduct($productId, $productData);
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function deleteProduct($productId)
    {
        return $this->productRepository->deleteProduct($productId);
    }

    /**
     * @param $searchCriteria
     * @return mixed
     */
    public function getProductsBySearch($searchCriteria)
    {
        return $this->productRepository->getProductsBySearch($searchCriteria);
    }

}
