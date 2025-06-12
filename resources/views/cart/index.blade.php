<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Keranjang Belanja</h1>
            <a href="{{ route('catalog.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Lanjut Belanja</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if (empty($cart))
            <p class="text-gray-600 text-center">Keranjang Anda kosong.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Produk</th>
                            <th class="py-3 px-6 text-left">Harga</th>
                            <th class="py-3 px-6 text-center">Jumlah</th>
                            <th class="py-3 px-6 text-right">Subtotal</th>
                            <th class="py-3 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($cart as $id => $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left flex items-center">
                                    @if ($item['image'])
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-12 h-12 object-cover mr-4">
                                    @endif
                                    <span>{{ $item['name'] }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">Rp{{ number_format($item['price'], 2, ',', '.') }}</td>
                                <td class="py-3 px-6 text-center">
                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center justify-center">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 border rounded px-2 py-1 text-center mr-2">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">Update</button>
                                    </form>
                                </td>
                                <td class="py-3 px-6 text-right">Rp{{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</td>
                                <td class="py-3 px-6 text-center">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Hapus produk ini dari keranjang?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end items-center mt-6">
                <div class="text-xl font-bold text-gray-800 mr-4">Total: Rp{{ number_format($total, 2, ',', '.') }}</div>
                <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Kosongkan keranjang Anda?');">
                    @csrf
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded mr-2">Kosongkan Keranjang</button>
                </form>
                <a href="#" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Checkout</a>
            </div>
        @endif
    </div>
</body>
</html> 