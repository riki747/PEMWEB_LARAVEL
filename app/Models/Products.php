<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Products extends Model
{
    protected $table = 'products'; // Sesuaikan dengan nama tabel kalian

    // Pastikan model Product sudah memiliki properti fillable agar bisa menerima input dari form
    protected $fillable = ['name', 'slug', 'description', 'sku', 'price', 'stock', 'product_category_id', 'image_url', 'is_active'];

    // Relasi ke kategori (opsional)
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    // Ini penting: biar Laravel pakai slug, bukan id
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
