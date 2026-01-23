<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Affiche tous les produits + panier
    public function index()
    {
        $products = Product::all();
        $cart = session()->get('cart', []);

        return view('index', compact('products', 'cart'));
    }

    // Affiche seulement le panier
    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // Ajouter un produit au panier
   public function add($id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->back()->with('error', 'Produit introuvable');
    }

    // Récupère le panier depuis la session ou initialise un tableau vide
    $cart = session()->get('cart', []);

    // Ici on **ne met que les infos simples**, jamais l'objet entier
    if (isset($cart[$id])) {
        $cart[$id]['quantity'] += 1;
    } else {
        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
        ];
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Produit ajouté au panier');
}

    // Supprimer un produit du panier
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produit supprimé du panier');
    }

    // Vider tout le panier
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Panier vidé');
    }

    // Retour à la page produits
    public function backToProducts()
    {
        return redirect()->route('products.index');
    }
}
