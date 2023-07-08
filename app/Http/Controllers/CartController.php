<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()) {
            $cart = Cart::where('id_user', auth()->user()->id)->get();
        } else {
            $cart = [];
        }

        return view('keranjang', [
            'cart' => $cart
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $products = $product->where('id_product', $request->id)->first();
        $cart = Cart::where('id_product', $request->id)
                    ->where('id_user', auth()->user()->id)
                    ->first();

        if ($cart) {
            $cart->update([
                'qty' => $cart->qty + 1,
                'total_harga' => $cart->total_harga + $products->harga
            ]);
        } else {
            Cart::create([
                'id_product' => $request->id,
                'id_user' => auth()->user()->id,
                'qty' => 1,
                'total_harga' => 1 * $products->harga
            ]);
        }

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        return view('detail_keranjang', [
            'title' => 'Detail Keranjang',
            'data' => Cart::where('id_cart', base64_decode($id))->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cart::destroy($id);

        return redirect()->back();
    }
}
