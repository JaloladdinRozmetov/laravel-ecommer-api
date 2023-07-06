<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartApiController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        $this->cartService->addToCart($request->product_id, $request->quantity);

        return response()->json(['message' => 'Item added to cart']);
    }

    public function removeFromCart(Request $request)
    {
        $this->cartService->removeFromCart($request->product_id);

        return response()->json(['message' => 'Item removed from cart']);
    }

    public function getCartItems(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $cart = Cart::where('user_id', $user->id)->with('cartItems.product')->first();

            if ($cart) {
                $items = $cart->cartItems;

                return response()->json(['items' => $items]);
            }
        }

        return response()->json(['message' => 'Cart not found'], 404);
    }
}
