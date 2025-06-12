<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);

        $cart = session()->get('cart');
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Jumlah produk berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Produk tidak ditemukan di keranjang.');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart');
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
        }
        return redirect()->back()->with('error', 'Produk tidak ditemukan di keranjang.');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
