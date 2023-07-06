<?php

namespace App\Services;

use App\Repositories\CartItemRepository;
use App\Repositories\CartRepository;
use Illuminate\Support\Facades\Auth;

class CartService
{
    protected $cartRepository;
    protected $cartItemRepository;

    public function __construct(CartRepository $cartRepository, CartItemRepository $cartItemRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->cartItemRepository = $cartItemRepository;
    }

    /**
     * @param $productId
     * @param $quantity
     * @return void
     */
    public function addToCart($productId, $quantity)
    {
        $userId = Auth::id();
        $cart = $this->cartRepository->getCartByUserId($userId);

        if (!$cart) {
            $cart = $this->cartRepository->createCart($userId);
        }

        $this->cartItemRepository->createCartItem($cart->id, $productId, $quantity);
    }

    /**
     * @param $productId
     * @return void
     */
    public function removeFromCart($productId)
    {
        $userId = Auth::id();
        $cart = $this->cartRepository->getCartByUserId($userId);

        if ($cart) {
            $this->cartItemRepository->deleteCartItem($cart->id, $productId);
        }
    }
}
