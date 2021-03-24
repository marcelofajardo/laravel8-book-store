<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /** 
     * Display item from cart.
     */
    public function show()
    {
        $cart = session('cart');
        
        return view('carts.cart', ['cartItems' => $cart]);
    }

    /**
     * Add product to a cart.
     */
    public function addItem(Request $request, $id)
    {
        $prevCart = $request->session()->get('cart');
        $qty = (int) $request->input('qty');
        
        if ($qty < 1) {
            $qty = 1;
        }

        $product = Product::findOrFail($id);

        $cart = new Cart($prevCart);
        $cart->addItem($id, $qty, $product);

        $request->session()->put('cart', $cart);
        
        return redirect()->back();
    }

    /**
     * Decrease specific quantity of item.
     */
    public function decreaseItem(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $prevCart = $request->session()->get('cart');

        $cart = new Cart($prevCart);
        $cart->decreaseItem($id, $product);
        $request->session()->put('cart', $cart);
        
        return redirect()->route('carts.all');
    }

    /**
     * Delete a specific item.
     */
    public function removeItem(Request $request, $id)
    {
        $cart = $request->session()->get('cart');

        if (array_key_exists($id,$cart->items)){
            unset($cart->items[$id]);
        } else {
            return redirect()->route('carts.all')->with('error', true);
        }

        $prevCart = $request->session()->get('cart');
        $updatedCart = new Cart($prevCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put('cart', $updatedCart);

        return redirect()->route('carts.all');
    }

    /**
     * Remove all item from cart.
     */
    public function clearCart(Request $request)
    {
        $cart = $request->session()->get('cart');

        if ($cart != null){
            $request->session()->forget('cart');
        } else {
            return redirect()->route('carts.all')->with('error', true);
        }
        
        return redirect()->route('carts.all');
    }

    /**
     * Checkout page
     */
    public function checkout(Request $request)
    {
        $cartItems = $request->session()->get('cart');

        if (empty($cartItems->totalQuantity)) {
            return redirect()->route('carts.all')->with('error', true);
        }
        
        return view('carts.checkout', ['cartItems' => session('cart')]);
    }
}
