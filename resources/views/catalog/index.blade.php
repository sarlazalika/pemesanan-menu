<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Header & Navigation -->
    <nav class="bg-white shadow mb-6">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="font-bold text-xl text-gray-800">d'edge coffee</div>
            <ul class="flex space-x-6 text-gray-700 font-medium">
                <li><a href="#" class="hover:text-orange-600">Main Menu</a></li>
                <li><a href="#" class="hover:text-orange-600">Sales</a></li>
                <li><a href="#" class="hover:text-orange-600">Payments</a></li>
                <li><a href="#" class="hover:text-orange-600">Product Management</a></li>
                <li><a href="#" class="hover:text-orange-600">Settings</a></li>
            </ul>
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center font-bold text-gray-700">SA</div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Catalog</h1>

        <!-- Filter Kategori -->
        <div class="flex flex-wrap gap-2 mb-4">
            <button class="px-4 py-1 rounded-full border border-gray-300 bg-gray-100 text-gray-700 text-sm font-medium hover:bg-orange-100">All</button>
            <button class="px-4 py-1 rounded-full border border-gray-300 bg-gray-100 text-gray-700 text-sm font-medium hover:bg-orange-100">HAPPY DRINK</button>
            <button class="px-4 py-1 rounded-full border border-gray-300 bg-gray-100 text-gray-700 text-sm font-medium hover:bg-orange-100">TRADITIONAL DRINK</button>
            <button class="px-4 py-1 rounded-full border border-gray-300 bg-gray-100 text-gray-700 text-sm font-medium hover:bg-orange-100">MANUAL BREW</button>
            <button class="px-4 py-1 rounded-full border border-gray-300 bg-gray-100 text-gray-700 text-sm font-medium hover:bg-orange-100">MOCKTAILS</button>
            <button class="px-4 py-1 rounded-full border border-gray-300 bg-orange-100 text-orange-700 text-sm font-medium hover:bg-orange-200">ESPRESSO BASED</button>
            <button class="px-4 py-1 rounded-full border border-gray-300 bg-gray-100 text-gray-700 text-sm font-medium hover:bg-orange-100">NON COFFEE</button>
            <button class="px-4 py-1 rounded-full border border-gray-300 bg-gray-100 text-gray-700 text-sm font-medium hover:bg-orange-100">MAKANAN BERAT</button>
        </div>

        <!-- Search Bar -->
        <div class="mb-6">
            <input type="text" placeholder="Search" class="w-1/2 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-400">
        </div>

        @if ($products->isEmpty())
            <p class="text-gray-600 text-center">Tidak ada produk yang tersedia saat ini.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 flex flex-col">
                        <div class="relative">
                            <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-3 py-1 rounded-full uppercase font-bold z-10">
                                {{ $product->productType ? strtoupper($product->productType->name) : 'ESPRESSO BASED' }}
                            </span>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover">
                            @else
                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-500">Tidak ada gambar</div>
                            @endif
                        </div>
                        <div class="p-4 flex-1 flex flex-col">
                            <h2 class="text-base font-semibold text-gray-800 mb-1">{{ $product->name }}</h2>
                            <span class="text-xs text-gray-500 mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}/cup</span>
                            <div class="mt-auto">
                                <button class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 rounded transition">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html> 