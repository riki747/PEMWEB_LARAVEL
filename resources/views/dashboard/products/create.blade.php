<x-layouts.app>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" class="text-center mb-6">Tambah Produk</flux:heading>
        <flux:separator class="h-4 bg-white mb-5" />
        <div class="border-l-2 border-green-400 bg-green-50 p-4 text-green-900 text-center mx-auto w-1/2 rounded-md">
            <p class="font-semibold">
                Pastikan semua data sudah terisi dengan <strong>Benar</strong>.
            </p>
        </div>
    </div>

    <div class=" mx-auto px-4 mt-10 text-center">
        <div class="border border-blue-200 text-blue-50 rounded-t-lg inline-block p-4 py-4">
            <flux:subheading size="lg">Form Data Produk</flux:subheading>
        </div>

        <form class="border-2 border-blue-200 p-5 rounded-lg backdrop-blur-sm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Nama Produk -->
            <flux:input label="Name" name="name" class="mb-4" />
            <!-- Slug -->
            <flux:input label="Slug" name="slug" class="mb-4" />
            <!-- SKU -->
            <flux:input label="SKU" name="sku" class="mb-4" />
            <!-- Kategori -->
            <flux:field class="mb-4">
                <flux:label for="product_category_id">Kategori</flux:label>

                <flux:select name="product_category_id" id="product_category_id" class="text-center transition-all duration-150 focus:ring-2 focus:ring-primary-500 hover:shadow-md"
                    aria-label="Pilih kategori produk">
                    <option value="" disabled {{ old('product_category_id') ? '' : 'selected' }}>Pilih kategori</option>
                    <option value="1" {{ old('product_category_id') == 1 ? 'selected' : '' }}>Asus</option>
                    <option value="2" {{ old('product_category_id') == 2 ? 'selected' : '' }}>Lenovo</option>
                    <option value="3" {{ old('product_category_id') == 3 ? 'selected' : '' }}>HP</option>
                    <option value="4" {{ old('product_category_id') == 4 ? 'selected' : '' }}>Acer</option>
                    <option value="5" {{ old('product_category_id') == 5 ? 'selected' : '' }}>MacBook</option>
                </flux:select>

                @error('product_category_id')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
                @enderror
            </flux:field>
            <!-- Harga -->
            <flux:input label="Price" name="price" class="mb-4" type="number" step="0.01" min="0" />
            <flux:text size="xs" class="mb-2 backdrop-blur-sm">Tanpa titik atau koma ribuan.</flux:text>
            <!-- Deskripsi -->
            <flux:textarea label="Description" name="description" class="mb-4"></flux:textarea>
            <!-- Stok -->
            <flux:input label="Stock" name="stock" class="mb-4" type="number" min="0" />
            <!-- Gambar Produk -->
            <flux:input type="file" label="Image" name="image_url" class="mb-4" accept="image/*" />
            <!-- Status Aktif -->
            <flux:checkbox label="Active" class="mb-6" name="is_active" checked />

            <flux:separator class="h-4 bg-white mt-3" />
            <!-- Tombol -->
            <div class="mt-7 mb-3 flex justify-center space-x-4">
                <flux:button
                    type="submit"
                    variant="ghost"
                    class="px-6 py-3 rounded-lg border border-blue-600 bg-blue-600 text-white 
                         hover:bg-gray-500 hover:text-blue-200 transition-colors duration-300">
                    Simpan
                </flux:button>
                <flux:button
                    type="button"
                    href="{{ route('products.index') }}"
                    variant="ghost"
                    class="px-6 py-3 rounded-lg border border-blue-600 bg-blue-600 text-white 
                         hover:bg-gray-500 hover:text-blue-200 transition-colors duration-300">
                    Kembali
                </flux:button>
            </div>
        </form>
    </div>
</x-layouts.app>