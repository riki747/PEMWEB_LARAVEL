<x-layouts.app>
    <x-slot name="title">Tambah Produk</x-slot>
    <x-slot name="header">Tambah Produk</x-slot>

    <div class="max-w-3xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6 text-black">
            <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Nama Produk -->
                <div>
                    <label class="block text-sm font-medium mb-1">Nama Produk</label>
                    <input type="text" name="name" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium mb-1 mt-2">Kategori</label>
                    <select name="product_category_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->product_category_id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Harga -->
                <div>
                    <label class="block text-sm font-medium mb-1 mt-2">Harga</label>
                    <input type="number" name="price" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium mb-1 mt-2">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
                </div>

                <!-- Stok -->
                <div>
                    <label class="block text-sm font-medium mb-1">Stok</label>
                    <input type="number" name="stock" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>


                <!-- Tombol  -->
                <div class="flex justify-center gap-4 mt-6">
                   
                    <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                        Simpan
                    </button>

                     <a href="{{ route('products.index') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-gray-400 transition">
                        Batal
                    </a>
                </div>

                <!-- Tombol Batal -->

            </form>
        </div>
    </div>
</x-layouts.app>