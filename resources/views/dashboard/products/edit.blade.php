<x-layouts.app :title="__('Products')">
    <div class="relative w-full">
        <flux:heading size="xl" class="text-center mb-6">Edit Produk</flux:heading>
        <flux:separator class="h-4 bg-white mb-6" />
        <div class="border-l-2 border-blue-200 bg-gradient-to-r from-blue-200 to-blue-50 p-4 shadow-sm mx-auto text-center w-1/2 rounded-md">
            <p class="text-blue-900 font-semibold">
                Anda sedang mengedit produk ( <strong class="px-1 text-lg">{{ $product->name }}</strong> )Pastikan semua data sesuai sebelum anda menyimpannya.
            </p>
        </div>
        <flux:subheading size="md" class="mb-2 mt-7">Gambar Produk:</flux:subheading>

        @if($product->image_url)
        <div class="border border-gray-300 rounded-lg p-4 ml-10 w-fit bg-gray-50 mb-3">
            <img
                src="{{ Storage::url($product->image_url) }}"
                alt="{{ $product->name }}"
                class="w-42 h-42 object-cover rounded mb-3 bg-gray-100 border border-gray-300">
        </div>
        @else
        <p class="text-sm text-gray-500 italic">Belum ada gambar.</p>
        @endif
    </div>

    <div class=" mx-auto px-4 text-center">
        <div class="border border-blue-200 text-blue-50 rounded-t-lg inline-block p-4 py-4">
            <flux:subheading size="lg">Form Data Produk</flux:subheading>
        </div>

        <form class="border-2 border-blue-200 p-5 rounded-lg backdrop-blur-sm" action="{{ route('products.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
            @method('patch')
            @csrf

            <flux:input label="Name" name="name" value="{{ $product->name }}" class="mb-4" />
            <flux:input label="Slug" name="slug" value="{{ $product->slug }}" class="mb-4" />
            <flux:input label="SKU" name="sku" value="{{ $product->sku }}" class="mb-4" />
            <flux:input label="Price" name="price" class="mb-4" value="{{ $product->price }}" />
            <flux:input label="Stock" name="stock" class="mb-4" value="{{ $product->stock }}" />

            <flux:field class="mb-4">
                <flux:label for="product_category_id">Kategori</flux:label>

                <flux:select name="product_category_id" id="product_category_id" class="text-center transition-all duration-150 focus:ring-2 focus:ring-primary-500 hover:shadow-md"
                    aria-label="Pilih kategori produk">
                    <option value="" disabled {{ old('product_category_id', $product->product_category_id) ? '' : 'selected' }}>Pilih kategori</option>
                    <option value="1" {{ old('product_category_id', $product->product_category_id) == 1 ? 'selected' : '' }}>Asus</option>
                    <option value="2" {{ old('product_category_id', $product->product_category_id) == 2 ? 'selected' : '' }}>Lenovo</option>
                    <option value="3" {{ old('product_category_id', $product->product_category_id) == 3 ? 'selected' : '' }}>HP</option>
                    <option value="4" {{ old('product_category_id', $product->product_category_id) == 4 ? 'selected' : '' }}>Acer</option>
                    <option value="5" {{ old('product_category_id', $product->product_category_id) == 5 ? 'selected' : '' }}>MacBook</option>
                </flux:select>

                @error('product_category_id')
                <flux:text color="red" size="sm" class="mt-1">{{ $message }}</flux:text>
                @enderror
            </flux:field>

            <flux:textarea label="Description" name="description" class="mb-4">{{ $product->description }}</flux:textarea>

            @if($product->image_url)
            <div class="mb-4">
                <img src="{{ Storage::url($product->image_url) }}" alt="{{ $product->name }}" class="w-22 h-22 object-cover rounded bg-gray-100 border border-gray-300 mb-2 rounded-lg">
            </div>
            @endif

            <flux:input type="file" label="Image" name="image" class="mb-4" />

            <flux:checkbox label="Active" class="mb-6" name="is_active" {{ $product->is_active ? 'checked' : '' }} />

            <flux:separator class="h-4 bg-white mt-3" />

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