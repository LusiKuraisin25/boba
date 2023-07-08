<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cart';
    protected $guarded = ['id_cart'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
