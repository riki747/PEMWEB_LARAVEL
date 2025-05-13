<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Products::paginate(10); // ambil data produk
        return view('dashboard', compact('products')); // kirim ke view dashboard.blade.php
    }
}