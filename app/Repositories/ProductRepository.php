<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllProducts()
    {
        return Product::all();
    }

    /**
     * @param $productData
     * @return mixed
     */
    public function createProduct($productData)
    {
        return Product::create($productData);
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function getProductById($productId)
    {
        return Product::findOrFail($productId);
    }

    /**
     * @param $productId
     * @param $productData
     * @return mixed
     */
    public function updateProduct($productId, $productData)
    {
        $product = Product::findOrFail($productId);
        $product->update($productData);

        return $product;
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function deleteProduct($productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();

        return $product;
    }

    /**
     * @param $searchCriteria
     * @return mixed
     */
    public function getProductsBySearch($searchCriteria)
    {
        return Product::where('product_name', 'LIKE', '%' . $searchCriteria . '%')
            ->orWhere('description', 'LIKE', '%' . $searchCriteria . '%')
            ->get();
    }
}
