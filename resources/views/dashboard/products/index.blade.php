<x-layouts.app>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" class="text-center mb-6">Daftar Produk</flux:heading>
        <flux:separator class="h-4 bg-white" />
    </div>
    <flux:subheading size="lg" class="py-4">Kelola data produk:</flux:subheading>



    <div class="bg-sky-100 shadow-sm rounded-lg p-8 ">
        <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-500 shadow-lg shadow-blue-500/50 hover:bg-blue-600 text-white transition rounded ">
            + Tambah Produk
        </a>
        @props(['products'])

        <div class="overflow-x-auto mt-6 border border-gray-200 rounded-lg shadow-xl">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-400 text-gray-800 text-sm uppercase tracking-wide border-b border-gray-500">
                    <tr>
                        <th class="px-6 py-3 text-left border-r border-gray-300">Nama Produk</th>
                        <th class="px-6 py-3 text-left border-r border-gray-300">Kategori</th>
                        <th class="px-6 py-3 text-left border-r border-gray-300">Harga</th>
                        <th class="px-6 py-3 text-left border-r border-gray-300">Deskripsi</th>
                        <th class="px-6 py-3 text-center border-r border-gray-300">Stok</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-900">
                    @forelse ($products as $product)
                    <tr class="hover:bg-gray-300 transition-colors duration-200">
                        <td class=" px-6 py-4 font-semibold text-sm border-r border-white">
                            {{ $product->name }}
                        </td>
                        <td class="px-6 py-4 text-sm border-r border-white">
                            {{ optional($product->category)->name ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm border-r border-white">
                            Rp {{ number_format($product->price, 2, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-sm border-r border-white max-w-sm truncate">
                            {{ Str::limit($product->description, 80) }}
                        </td>
                        <td class="px-6 py-4 text-center text-sm border-r border-white">
                            {{ $product->stock }}
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-2 text-sm border-r border-white ">
                            <a href="{{ route('products.edit', $product->slug) }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1.5 rounded transition">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}"
                                method="POST" onsubmit="return confirm('Yakin nii mo dihapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500 italic">
                            Belum ada produk yang ditambahkan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>


</x-layouts.app>