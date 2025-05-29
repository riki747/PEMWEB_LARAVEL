<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
  use HasFactory;
    protected $table = 'product_categories'; // Sesuaikan dengan nama tabel kalian
    public function products()
    {
       return $this->belongsTo(ProductCategory::class);
    }
}
