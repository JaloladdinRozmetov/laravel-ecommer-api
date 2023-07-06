<?php

namespace App\Repositories;

use App\Models\CartItem;

class CartItemRepository
{
    public function createCartItem($cartId, $productId, $quantity)
    {
        return CartItem::create([
            'cart_id' => $cartId,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

    public function deleteCartItem($cartId, $productId)
    {
        return CartItem::where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->delete();
    }
}
