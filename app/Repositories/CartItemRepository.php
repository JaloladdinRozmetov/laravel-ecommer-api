<?php

namespace App\Repositories;

use App\Models\CartItem;

class CartItemRepository
{
    /**
     * @param $cartId
     * @param $productId
     * @param $quantity
     * @return mixed
     */
    public function createCartItem($cartId, $productId, $quantity)
    {
        return CartItem::create([
            'cart_id' => $cartId,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

    /**
     * @param $cartId
     * @param $productId
     * @return mixed
     */
    public function deleteCartItem($cartId, $productId)
    {
        return CartItem::where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->delete();
    }
}
