<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class HomepageController extends Controller
{
    public function index()
    {
        $title = 'Homepage'; 
        $products = Products::all();

        return view('web.homepage', ['title' => $title, 'products' => $products]);
    }
    public function products()
    {
        return view('web.products');
    }
    public function product($slug)
    {
        return view('web.product', ['slug' => $slug]);
    }
    public function categories()
    {
        return view('web.categories');
    }
    public function category($slug)
    {
        return view('web.category_by_slug', ['slug' => $slug]);
    }
    public function cart()
    {
        return view('web.cart');
    }

    public function checkout()
    {
        return view('web.checkout');
    }
}
