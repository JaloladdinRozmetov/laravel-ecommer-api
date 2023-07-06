<?php

namespace App\DTO;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryDTO
{
    public $name;
    public $parent_id;

    public function __construct($name, $parent_id)
    {
        $this->name = $name;
        $this->parent_id = $parent_id;
    }

    public static function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'parent_id' => 'numeric',
        ]);

        return $validator->validate();
    }

    public static function fromRequest(Request $request)
    {
        $validatedData = self::validate($request);

        return new self(
            $validatedData['name'],
            $validatedData['parent_id'] ?? 0,
        );
    }
}
