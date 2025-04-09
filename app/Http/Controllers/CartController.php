<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
class CartController extends Controller
{
    //

    public function addToCart($id)
    {
        Cart::create(['product_id' => $id]);
        return redirect()->route('products.index')->with('success', 'Product added to cart.');
    }

    public function index()
    {
        $cartItems = Cart::with('product')->orderByRaw('(SELECT price FROM products WHERE products.id = carts.product_id) ASC')->get();
        return view('cart.index', compact('cartItems'));
    }
}