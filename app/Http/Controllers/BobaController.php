<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class BobaController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function category($category)
    {
        $id_category = Category::where('slug', $category)->first()->id_category;
        return view('category', [
            'title' => Category::where('slug', $category)->first()->name,
            'product' => Product::where('id_category', $id_category)->get()
        ]);
    }

    public function search(Request $request)
    {
        $data = Product::where('name', 'like', '%'.$request->query('search').'%')->get();

        return view('search', [
            'data' => $data,
            'request' => $request->query('search')
        ]);
    }
}
