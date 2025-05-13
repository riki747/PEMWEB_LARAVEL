<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_categories'; // Sesuaikan dengan nama tabel kalian
    public function products()
    {
        return $this->hasMany(Products::class, 'product_category_id', 'product_category_id');
    }
}
