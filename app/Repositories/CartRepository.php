<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository
{
    /**
     * @param $userId
     * @return mixed
     */
    public function getCartByUserId($userId)
    {
        return Cart::where('user_id', $userId)->first();
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function createCart($userId)
    {
        return Cart::create(['user_id' => $userId]);
    }
}
