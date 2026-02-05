<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $cart = session()->get('cart', []);

        return view('index', compact('products', 'cart'));
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price
        ];
        

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back();
    }
}
