<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='kookuproducts';

    protected $fillable = [
        'name',
        'image',
        'quantity',
        'price',
        'tiktok_price',
        'shopee_price'
    ];
}
