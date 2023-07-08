<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_product';
    protected $guarded = ['id_product'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
