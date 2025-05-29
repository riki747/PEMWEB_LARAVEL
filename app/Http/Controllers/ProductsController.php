<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::with('category')->paginate(10);
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'product_category_id' => 'required|integer',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        Products::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'sku' => strtoupper(Str::random(8)),
            'description' => $validated['description'],
            'product_category_id' => $validated['product_category_id'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'image_url' => $validated['image_url'],
            'is_active' => $request->has('is_active'),
        ]);

        $imagePath = null;

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/products', $filename); // disimpan ke storage/app/public/products
            $imagePath = 'products/' . $filename; // nanti diakses via Storage::url()
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
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
    // edit() → Ganti parameter product
    public function edit(Products $product)
    {
        // $categories = ProductCategory::all();
        return view('dashboard.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        // Validasi dulu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'product_category_id' => 'required|integer',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            // Tambahkan validasi untuk field lain jika perlu
        ]);

        // Tangani checkbox 'is_active'
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        // Update data dengan data validasi
        $product->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with(
            'success',
            'Produk berhasil dihapus.'
        );
    }
}
