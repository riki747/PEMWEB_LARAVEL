<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductCategory; // jangan lupa import
use App\Models\Categories; // jangan lupa import
use Illuminate\Support\Str; // untuk slug

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Products::all(); // ini manggil model
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all(); // sesuai nama model lu
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * menambah data resource in storage.
     */
    public function store(Request $request)
    { // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'product_category_id' => 'required|integer|in:1,2,3', // Validasi ID kategori antara 1, 2, dan 3
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        // Menyimpan data ke database
        Products::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']), // <= ini bikin slug dari nama
            'sku' => 'SKU-' . strtoupper(Str::random(6)), // <= ini bikin SKU random
            'description' => $request->input('description'), // <= ini ambil dari form
            'image_url' => $request->input('image_url'), // <= ini ambil dari form
            'is_active' => $request->input('is_active', 1), // <= ini ambil dari form
            'product_category_id' => $validated['product_category_id'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        $categories = ProductCategory::all(); // Contoh kalau ada kategori produk
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
