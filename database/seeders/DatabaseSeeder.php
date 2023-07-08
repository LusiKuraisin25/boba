<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Lusi',
            'email' => 'lusi@gmail.com',
            'role' => 'Admin',
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'role' => 'User',
            'password' => bcrypt('12345678')
        ]);


        Category::create([
            'name' => 'Chocolatte',
            'slug' => 'chocolatte'
        ]);
        Category::create([
            'name' => 'Red Velvet',
            'slug' => 'redvelvet'
        ]);
        Category::create([
            'name' => 'Green Tea',
            'slug' => 'greentea'
        ]);
        Category::create([
            'name' => 'Bubble Gum',
            'slug' => 'bubble'
        ]);
        Category::create([
            'name' => 'Vanilla Latte',
            'slug' => 'vanillalatte'
        ]);
        Category::create([
            'name' => 'Taro',
            'slug' => 'taro'
        ]);

        Product::create([
            'name' => 'Chocolatte Original',
            'slug' => 'chocolatte-original',
            'stock' => 10,
            'harga' => '10000',
            'id_category' => 1
        ]);
        Product::create([
            'name' => 'Chocolatte Matcha',
            'slug' => 'chocolatte-matcha',
            'stock' => 10,
            'harga' => '10000',
            'id_category' => 1
        ]);
        Product::create([
            'name' => 'Chocolatte Oreo',
            'slug' => 'chocolatte-oreo',
            'stock' => 10,
            'harga' => '11000',
            'id_category' => 1
        ]);
        Product::create([
            'name' => 'Red Velvet',
            'slug' => 'red-velvet',
            'stock' => 10,
            'harga' => '10000',
            'id_category' => 2
        ]);
        Product::create([
            'name' => 'Red Velvet Oreo',
            'slug' => 'red-velvet-oreo',
            'stock' => 10,
            'harga' => '11000',
            'id_category' => 2
        ]);
        Product::create([
            'name' => 'Red Velvet Marshmallow',
            'slug' => 'red-velvet-marshmallow',
            'stock' => 10,
            'harga' => '12000',
            'id_category' => 2
        ]);
        Product::create([
            'name' => 'Green Tea',
            'slug' => 'green-tea',
            'stock' => 10,
            'harga' => '10000',
            'id_category' => 3
        ]);
        Product::create([
            'name' => 'Green Tea Oreo',
            'slug' => 'green-tea-oreo',
            'stock' => 10,
            'harga' => '10000',
            'id_category' => 3
        ]);

    }
}
