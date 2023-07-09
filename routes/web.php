<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BobaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::controller(BobaController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/category/{category}', 'category');
        Route::get('/search', 'search');
    });
    
    Route::controller(CartController::class)->group(function() {
        Route::get('/keranjang', 'index');
        Route::post('/keranjang', 'store');
        Route::get('/keranjang/{id}', 'detail');
        Route::delete('/delete/cart/{id}', 'destroy');
    });

    Route::controller(PesananController::class)->group(function() {
        Route::post('/checkout', 'store');
        Route::delete('/delete/order/{id}', 'destroy');
        Route::post('/confirm/order/{id}', 'confirm')->middleware('admin');
        Route::post('/cancel/order/{id}', 'cancel')->middleware('admin');
    });
    
    Route::get('/profile', [ProfileController::class, 'index']);    
    Route::get('/profile/edit', [ProfileController::class, 'edit']);    
    Route::patch('/profile/{id}/edit', [ProfileController::class, 'update']);    
});

Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);    
    Route::get('/pesanan', [AdminController::class, 'pesanan']);    
    Route::get('/products', [AdminController::class, 'products']);    
    Route::get('/transaksi', [AdminController::class, 'transaksi']);    
    Route::get('/product/add', [ProductController::class, 'create']);    
    Route::post('/product/add', [ProductController::class, 'store']);    
    Route::get('/product/{id}', [ProductController::class, 'edit']);    
    Route::get('/product/add-product', [ProductController::class, 'create']);    
    Route::put('/product/{id}/edit', [ProductController::class, 'update']);    
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);    
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
