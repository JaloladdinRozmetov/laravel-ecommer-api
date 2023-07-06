<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::where('name', 'Category 1')->first();

        Product::create([
            'product_name' => 'Product 1',
            'price' => 10.99,
            'description' => 'Product 1 description',
            'image' => 'product1.jpg',
            'status' => true,
            'category_id' => $category->id,
        ]);

        Product::create([
            'product_name' => 'Product 2',
            'price' => 19.99,
            'description' => 'Product 2 description',
            'image' => 'product2.jpg',
            'status' => true,
            'category_id' => $category->id,
        ]);

        // Add more products as needed
    }
}
