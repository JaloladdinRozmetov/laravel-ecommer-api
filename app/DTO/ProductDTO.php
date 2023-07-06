<?php

namespace App\DTO;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductDTO
{
    public $product_name;
    public $price;
    public $description;
    public $image;
    public $status;
    public $category_id;

    public function __construct($product_name, $price, $description, $image, $status, $category_id)
    {
        $this->product_name = $product_name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
        $this->status = $status;
        $this->category_id = $category_id;
    }

    public static function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'status' => 'nullable|boolean',
            'category_id' => 'required|integer',
        ]);

        return $validator->validate();
    }

    public static function fromRequest(Request $request)
    {
        $validatedData = self::validate($request);

        return new self(
            $validatedData['product_name'],
            $validatedData['price'],
            $validatedData['description'] ?? null,
                $validatedData['image'] ?? null,
            $validatedData['status'] ?? 1,
            $validatedData['category_id']
        );
    }
}
