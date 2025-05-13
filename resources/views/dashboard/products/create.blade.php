<x-layouts.app>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-white mb-6 text-center">Tambah Produk</h1>

        <div class="bg-white rounded-lg shadow-md p-6 text-black">
            <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Nama Produk -->
                <div>
                    <label class="block text-sm font-medium mb-1">Nama Produk</label>
                    <input type="text" name="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-400" required>
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium mb-1 mt-2">Kategori</label>
                    <select name="product_category_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-400" required>
                        <option value="1">Kategori 1</option>
                        <option value="2">Kategori 2</option>
                        <option value="3">Kategori 3</option>
                    </select>
                </div>

                <!-- Harga -->
                <div>
                    <label class="block text-sm font-medium mb-1 mt-2">Harga</label>
                    <input type="number" name="price" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-400" required>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium mb-1 mt-2">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-400"></textarea>
                </div>

                <!-- Stok -->
                <div>
                    <label class="block text-sm font-medium mb-1">Stok</label>
                    <input type="number" name="stock" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-400" required>
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

            </form>
        </div>
    </div>
</x-layouts.app>
