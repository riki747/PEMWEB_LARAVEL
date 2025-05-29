<!-- tampilan dashboard Customer -->
<x-layouts.app title="Dashboard Customer">
   <div>
        <div class="max-w-3xl mx-auto px-4 py-8">
            <div class="bg-white rounded-lg shadow-md p-6 text-black">
                <h1 class="text-xl font-bold mb-4">Dashboard Customer</h1>
                <p>Selamat datang di dashboard customer kami! Di sini Anda dapat mengelola produk Anda dengan mudah.</p>
                <p>Silakan pilih opsi di menu samping untuk mulai.</p>
            </div>
        </div>
        <!-- log-out -->
        <div class="max-w-3xl mx-auto px-4 py-8">
            <div class="bg-white rounded-lg shadow-md p-6 text-black">
                <h2 class="text-lg font-bold mb-4">Keluar</h2>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white transition rounded">
                        Keluar
                    </button>
                </form>
            </div>
   </div>
</x-layouts.app>