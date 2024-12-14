<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    public $incrementing=false;

    protected $fillable = [
        'id',
        'name',
        'price',
        'currency',
        'quantity',
        'category_name',
        'barcode',
        'description',
        'images',
    ];
}
