<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name_product',
        'deskripsi',
        'harga',
        'stock'
    ];
}
