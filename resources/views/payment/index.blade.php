<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Konfirmasi Pesanan & Pembayaran</h1>

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-3">Ringkasan Pesanan</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Produk</th>
                            <th class="py-3 px-6 text-center">Jumlah</th>
                            <th class="py-3 px-6 text-right">Harga</th>
                            <th class="py-3 px-6 text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($cart as $id => $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $item['name'] }}</td>
                                <td class="py-3 px-6 text-center">{{ $item['quantity'] }}</td>
                                <td class="py-3 px-6 text-right">Rp{{ number_format($item['price'], 2, ',', '.') }}</td>
                                <td class="py-3 px-6 text-right">Rp{{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-100 font-bold">
                            <td colspan="3" class="py-3 px-6 text-right text-lg">Total Pembayaran:</td>
                            <td class="py-3 px-6 text-right text-lg">Rp{{ number_format($total, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <h2 class="text-xl font-semibold text-gray-700 mb-3">Metode Pembayaran</h2>
        <form action="{{ route('payment.process') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="payment_method" class="block text-gray-700 text-sm font-bold mb-2">Pilih Metode Pembayaran:</label>
                <select name="payment_method" id="payment_method" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Pilih...</option>
                    <option value="credit_card">Kartu Kredit</option>
                    <option value="transfer">Transfer Bank</option>
                    <option value="ewallet">E-Wallet</option>
                    <option value="cash">Tunai (Bayar di Tempat)</option>
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Bayar Sekarang</button>
                <a href="{{ route('cart.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Kembali ke Keranjang</a>
            </div>
        </form>
    </div>
</body>
</html> 