<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Pesanan;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'title' => 'Dashboard',
        ]); 
    }

    public function transaksi()
    {
        return view('transaksi', [
            'title' => 'Transaksi',
            'transaction' => Transaksi::all()
        ]); 
    }

    public function pesanan()
    {
        return view('pesanan', [
            'title' => 'Pesanan',
            'cart' => Pesanan::all()
        ]); 
    }

    public function products()
    {
        return view('products', [
            'title' => 'Products',
            'data' => Product::all()
        ]); 
    }
}
