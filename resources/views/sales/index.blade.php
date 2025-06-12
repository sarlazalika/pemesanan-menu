<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Laporan Penjualan</h1>

        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Total Pendapatan:</strong>
            <span class="block sm:inline text-xl">Rp{{ number_format($totalSalesAmount, 2, ',', '.') }}</span>
        </div>

        <h2 class="text-xl font-semibold text-gray-700 mb-4">Daftar Pesanan Selesai</h2>

        @if ($orders->isEmpty())
            <p class="text-gray-600 text-center">Belum ada penjualan yang tercatat.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID Pesanan</th>
                            <th class="py-3 px-6 text-left">Tanggal</th>
                            <th class="py-3 px-6 text-left">Pelanggan</th>
                            <th class="py-3 px-6 text-right">Total</th>
                            <th class="py-3 px-6 text-center">Detail Item</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($orders as $order)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">#{{ $order->id }}</td>
                                <td class="py-3 px-6 text-left">{{ $order->created_at->format('d M Y H:i') }}</td>
                                <td class="py-3 px-6 text-left">{{ $order->user ? $order->user->name : 'Tamu' }}</td>
                                <td class="py-3 px-6 text-right">Rp{{ number_format($order->total_amount, 2, ',', '.') }}</td>
                                <td class="py-3 px-6 text-center">
                                    <ul class="list-disc list-inside text-left">
                                        @foreach ($order->orderItems as $item)
                                            <li>{{ $item->product ? $item->product->name : 'Produk tidak dikenal' }} ({{ $item->quantity }}x) - Rp{{ number_format($item->price, 2, ',', '.') }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html> 