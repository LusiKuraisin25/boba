<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        return view('add-product', [
            'title' => 'Add Product',
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {    
            $imagePath = $request->file('image')->store('public/product_image');
        }

        Product::create([
            'image' => $imagePath,
            'name' => $request->name,
             'slug' => Str::slug($request->name),
             'harga' => $request->harga,
             'stock' => $request->stock,
             'description' => $request->deskripsi,
             'id_category' => $request->id_category
        ]);

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('edit-product', [
            'title' => 'Edit Product',
            'data' => Product::where('id_product', base64_decode($id))->first(),
            'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    
     public function update(Request $request)
     {
        $product = Product::find($request->id_product);
    
    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $photoPath = $request->file('image')->store('public/product-photos');
        $product->image = $photoPath;
        }

        $product->name = $request->name;
        $product->slug = Str::slug($request->name) . '-' . $product->id_product;
        $product->harga = $request->harga;
        $product->stock = $request->stock;
        $product->description = $request->deskripsi;
        $product->id_category = $request->id_category;

        $product->save();

        return redirect('/products');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->back();
    }
}
