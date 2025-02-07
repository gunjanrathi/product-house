<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price'];

    public function updateProduct($product_data,$product){
        $product->name = $product_data['name'];
        $product->price = $product_data['price'];
        $product->save();
    }
}
