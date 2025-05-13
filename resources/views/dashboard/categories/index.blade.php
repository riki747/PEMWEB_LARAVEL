<x-app-layout>
    <x-slot name="header">Kategori Produk</x-slot>

    <div class="p-4">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-4">+ Tambah Kategori</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $kategori)
                    <tr>
                        <td>{{ $kategori->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $kategori->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('categories.destroy', $kategori->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
