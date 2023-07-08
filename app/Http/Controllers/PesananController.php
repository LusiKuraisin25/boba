<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Cart;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $product = Product::where('$id_product', $request->id_product);
        $product->update([
            'stock' => $product->first()->stock - $request->qty
        ]);
        Pesanan::create([
            'id_user' => $request->id_user,
            'id_product' => $request->id_product,
            'name_product' => $request->product,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'total_harga' => $request->total,
        ]);

        Cart::destroy($request->id_cart);
        
        return redirect('/keranjang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Pesanan::where('id_pesanan', $id)->first()->status != 'requested') {
            Transaksi::destroy($id);
        }
        Pesanan::destroy($id);

        return redirect('/profile');
    }

    public function confirm($id)
    {
        $orders = Pesanan::where('id_pesanan', $id);
        $order = Pesanan::where('id_pesanan', $id)->firstOrFail();
        $order->update(['status' => 'confirmed']);

        Transaksi::create([
            'id_pesanan' => $orders->first()->id_pesanan,
            'id_user' => $orders->first()->id_user,
            'id_product' => $orders->first()->id_product,
            'name_product' => $orders->first()->name_product,
            'qty' => $orders->first()->qty,
            'harga' => $orders->first()->harga,
            'total_harga' => $orders->first()->total_harga,
        ]);

        return redirect()->back();
    }
    
    public function cancel($id)
    {
        Pesanan::where('id_pesanan', $id)->update([
            'status' => 'canceled'
        ]);
    
        return redirect()->back();
    }
}
