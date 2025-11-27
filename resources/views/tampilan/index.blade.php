<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - Inventory Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <i class="fas fa-boxes text-indigo-600 text-2xl mr-3"></i>
                    <span class="text-xl font-bold text-gray-800">Inventory Manager</span>
                </div>
                <div class="flex items-center">
                    <span class="text-sm text-gray-600">Pertemuan 4 - Laravel</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">
                    <i class="fas fa-list text-indigo-600 mr-3"></i>Daftar Produk
                </h1>
                <p class="text-gray-600">Kelola dan lihat semua produk di inventory Anda</p>
            </div>
            <a 
                href="{{ route('products.create') }}"
                class="bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-2"
            >
                <i class="fas fa-plus-circle"></i>Tambah Produk Baru
            </a>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-indigo-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Total Produk</p>
                        <p class="text-4xl font-bold text-gray-800">{{ count($products) }}</p>
                    </div>
                    <i class="fas fa-boxes text-indigo-600 text-4xl opacity-20"></i>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Total Stok</p>
                        <p class="text-4xl font-bold text-gray-800">{{ $products->sum('stock') }}</p>
                    </div>
                    <i class="fas fa-cubes text-purple-600 text-4xl opacity-20"></i>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Total Nilai Inventaris</p>
                        <p class="text-2xl font-bold text-gray-800">Rp{{ number_format($products->sum(function($product) { return $product->price * $product->stock; }), 0, ',', '.') }}</p>
                    </div>
                    <i class="fas fa-coins text-blue-600 text-4xl opacity-20"></i>
                </div>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Table Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">
                    <i class="fas fa-table mr-2"></i>Daftar Produk
                </h2>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 border-b-2 border-gray-200">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                <i class="fas fa-hashtag text-indigo-500 mr-2"></i>No
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                <i class="fas fa-tag text-indigo-500 mr-2"></i>Nama Produk
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                <i class="fas fa-align-left text-indigo-500 mr-2"></i>Deskripsi
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                <i class="fas fa-dollar-sign text-indigo-500 mr-2"></i>Harga
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                <i class="fas fa-box text-indigo-500 mr-2"></i>Stok
                            </th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">
                                <i class="fas fa-cog text-indigo-500 mr-2"></i>Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($products as $index => $product)
                        <tr class="hover:bg-indigo-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-sm text-gray-700 font-semibold">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700 font-medium">
                                <span class="inline-flex items-center gap-2">
                                    <i class="fas fa-cube text-indigo-500"></i>
                                    {{ $product->title }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ Str::limit($product->description, 50, '...') }}
                            </td>
                            <td class="px-6 py-4 text-sm font-semibold text-gray-700">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-bold">
                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm font-semibold">
                                @if($product->stock > 20)
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">
                                        <i class="fas fa-check-circle mr-1"></i>{{ $product->stock }} unit
                                    </span>
                                @elseif($product->stock > 5)
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-bold">
                                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $product->stock }} unit
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-bold">
                                        <i class="fas fa-times-circle mr-1"></i>{{ $product->stock }} unit
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex justify-center gap-2">
                                    <a 
                                        href="{{ route('products.edit', $product->id) }}"
                                        class="inline-flex items-center gap-1 bg-indigo-100 hover:bg-indigo-200 text-indigo-800 px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105 font-semibold text-xs"
                                    >
                                        <i class="fas fa-edit"></i>Edit
                                    </a>
                                    <form 
                                        action="{{ route('products.destroy', $product->id) }}" 
                                        method="POST" 
                                        class="inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit"
                                            class="inline-flex items-center gap-1 bg-red-100 hover:bg-red-200 text-red-800 px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105 font-semibold text-xs"
                                        >
                                            <i class="fas fa-trash-alt"></i>Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-inbox text-gray-400 text-6xl mb-4"></i>
                                    <p class="text-gray-600 text-lg font-semibold mb-4">Belum ada produk</p>
                                    <p class="text-gray-500 mb-6">Mulai tambahkan produk baru untuk melengkapi inventory Anda</p>
                                    <a 
                                        href="{{ route('products.create') }}"
                                        class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-bold py-2 px-4 rounded-lg transition-all duration-300"
                                    >
                                        <i class="fas fa-plus-circle"></i>Tambah Produk Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Info Section -->
        <div class="mt-8 bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4 shadow-md">
            <p class="text-sm text-blue-800">
                <i class="fas fa-lightbulb text-blue-600 mr-2"></i>
                <strong>Tips:</strong> Klik tombol Edit untuk mengubah detail produk, atau Hapus untuk menghapus produk dari inventory. Stok berwarna merah menunjukkan stok yang sangat terbatas.
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-16 bg-gray-800 text-gray-300 text-center py-6">
        <p class="text-sm">
            <i class="fas fa-copyright"></i> 2025 Inventory Manager - Latihan Laravel Pertemuan 4
        </p>
    </footer>
</body>
</html>