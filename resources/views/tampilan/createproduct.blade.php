<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Inventory Manager</title>
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
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">
                <i class="fas fa-plus-circle text-indigo-600 mr-3"></i>Tambah Produk Baru
            </h1>
            <p class="text-gray-600">Isikan formulir di bawah untuk menambahkan produk ke inventory Anda</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Informasi Produk</h2>
            </div>

            <!-- Form Content -->
            <form action="{{route('products.store')}}" method="POST" class="p-8 space-y-6">
                @csrf

                <!-- Name Field -->
                <div class="group">
                    <label for="txtnama" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-tag text-indigo-500 mr-2"></i>Nama Produk
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="txtnama"
                        name="txtnama"
                        placeholder="Masukkan nama produk"
                        required
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 text-gray-700 placeholder-gray-400 focus:outline-none"
                    >
                    <p class="text-xs text-gray-500 mt-1">Gunakan nama yang jelas dan deskriptif</p>
                </div>

                <!-- Description Field -->
                <div class="group">
                    <label for="txtdes" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-align-left text-indigo-500 mr-2"></i>Deskripsi Produk
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <textarea 
                        id="txtdes"
                        name="txtdes"
                        placeholder="Masukkan deskripsi lengkap produk"
                        rows="4"
                        required
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 text-gray-700 placeholder-gray-400 focus:outline-none resize-none"
                    ></textarea>
                    <p class="text-xs text-gray-500 mt-1">Jelaskan fitur dan keunggulan produk Anda</p>
                </div>

                <!-- Price and Stock Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Price Field -->
                    <div class="group">
                        <label for="txtharga" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-dollar-sign text-indigo-500 mr-2"></i>Harga
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-3 text-gray-500 font-semibold">Rp</span>
                            <input 
                                type="number" 
                                id="txtharga"
                                name="txtharga"
                                placeholder="0"
                                min="0"
                                step="1000"
                                required
                                class="w-full pl-12 pr-4 py-3 rounded-lg border-2 border-gray-300 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 text-gray-700 focus:outline-none"
                            >
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Masukkan harga dalam rupiah</p>
                    </div>

                    <!-- Stock Field -->
                    <div class="group">
                        <label for="txtstock" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-box text-indigo-500 mr-2"></i>Stok
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <input 
                            type="number" 
                            id="txtstock"
                            name="txtstock"
                            placeholder="0"
                            min="0"
                            required
                            class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 text-gray-700 placeholder-gray-400 focus:outline-none"
                        >
                        <p class="text-xs text-gray-500 mt-1">Jumlah stok yang tersedia</p>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-6 border-t border-gray-200">
                    <button 
                        type="submit"
                        class="flex-1 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
                    >
                        <i class="fas fa-check-circle"></i>Simpan Produk
                    </button>
                    <button 
                        type="reset"
                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 flex items-center justify-center gap-2"
                    >
                        <i class="fas fa-redo"></i>Reset Form
                    </button>
                </div>
            </form>
        </div>

        <!-- Info Section -->
        <div class="mt-8 bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4 shadow-md">
            <p class="text-sm text-blue-800">
                <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                <strong>Tips:</strong> Pastikan semua field terisi dengan benar sebelum menyimpan. Data yang Anda masukkan akan ditambahkan ke database inventory.
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