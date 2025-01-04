<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';
    protected $fillable = [
        'name_product', 'deskripsi', 'harga', 'stock'
    ];
}
