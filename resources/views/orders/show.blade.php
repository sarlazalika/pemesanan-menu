<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan #{{ $order->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Pesanan #{{ $order->id }}</h1>
            <a href="{{ route('orders.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Kembali ke Daftar Pesanan</a>
        </div>

        <div class="mb-6 p-4 border rounded-lg bg-gray-50">
            <h2 class="text-xl font-semibold text-gray-700 mb-3">Informasi Pesanan</h2>
            <p class="text-gray-600 mb-1"><strong>Tanggal Pesanan:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
            <p class="text-gray-600 mb-1"><strong>Pelanggan:</strong> {{ $order->user ? $order->user->name : 'Tamu' }}</p>
            <p class="text-gray-600 mb-1"><strong>Total Pembayaran:</strong> Rp{{ number_format($order->total_amount, 2, ',', '.') }}</p>
            <p class="text-gray-600"><strong>Status:</strong> 
                <span class="px-2 py-1 font-semibold leading-tight rounded-full {{ $order->status == 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-3">Item Pesanan</h2>
            @if ($order->orderItems->isEmpty())
                <p class="text-gray-600">Tidak ada item dalam pesanan ini.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Produk</th>
                                <th class="py-3 px-6 text-center">Jumlah</th>
                                <th class="py-3 px-6 text-right">Harga Satuan</th>
                                <th class="py-3 px-6 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($order->orderItems as $item)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left">{{ $item->product ? $item->product->name : 'Produk tidak dikenal' }}</td>
                                    <td class="py-3 px-6 text-center">{{ $item->quantity }}</td>
                                    <td class="py-3 px-6 text-right">Rp{{ number_format($item->price, 2, ',', '.') }}</td>
                                    <td class="py-3 px-6 text-right">Rp{{ number_format($item->quantity * $item->price, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</body>
</html> 