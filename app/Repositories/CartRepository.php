<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository
{
    public function getCartByUserId($userId)
    {
        return Cart::where('user_id', $userId)->first();
    }

    public function createCart($userId)
    {
        return Cart::create(['user_id' => $userId]);
    }
}
