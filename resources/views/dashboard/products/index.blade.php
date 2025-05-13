<x-layouts.app>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-bold text-center text-white mb-6">Data Produk</h1>
        <div class="bg-white text-black rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Tabel Produk</h2>
                <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white transition rounded">
                    + Tambah Produk
                </a>
            </div>

            <!-- {{-- Tabel pakai FluxUI --}} -->
            <flux:table class="mt-6" :paginate="$products">
                <flux:columns>
                    <flux:column>Nama Produk</flux:column>
                    <flux:column>Kategori</flux:column>
                    <flux:column>Harga</flux:column>
                    <flux:column>Deskripsi</flux:column>
                    <flux:column>Stok</flux:column>
                    <flux:column>Aksi</flux:column>
                </flux:columns>

                <flux:rows>
                    @foreach ($products as $product)

                    <flux:row :key="$product->id">
                        <flux:cell>{{ $product->name }}</flux:cell>
                        <flux:cell>{{ $product->category->category_name }}</flux:cell>
                        <flux:cell  class="flex justify-center">Rp {{ number_format($product->price, 2, ',', '.') }}</flux:cell>
                        <flux:cell>{{ $product->description }}</flux:cell>
                        <flux:cell>{{ $product->stock }}</flux:cell>
                        

                        <flux:cell class="flex justify-center items-center">
                            <flux:button class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-1 rounded mx-4 " size="sm" variant="outline" href="{{ route('products.edit', $product->id) }}">
                                Edit
                            </flux:button>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <flux:button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded mx-2" type="submit" size="sm" variant="outline">
                                    Hapus
                                </flux:button>
                            </form>
                        </flux:cell>

                    </flux:row>
                    @endforeach
                </flux:rows>
            </flux:table>
        </div>
    </div>

</x-layouts.app>