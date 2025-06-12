<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Pesanan</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($orders->isEmpty())
            <p class="text-gray-600 text-center">Belum ada pesanan yang tercatat.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID Pesanan</th>
                            <th class="py-3 px-6 text-left">Pelanggan</th>
                            <th class="py-3 px-6 text-right">Total</th>
                            <th class="py-3 px-6 text-left">Status</th>
                            <th class="py-3 px-6 text-left">Tanggal</th>
                            <th class="py-3 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($orders as $order)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">#{{ $order->id }}</td>
                                <td class="py-3 px-6 text-left">{{ $order->user ? $order->user->name : 'Tamu' }}</td>
                                <td class="py-3 px-6 text-right">Rp{{ number_format($order->total_amount, 2, ',', '.') }}</td>
                                <td class="py-3 px-6 text-left">
                                    <span class="px-2 py-1 font-semibold leading-tight rounded-full {{ $order->status == 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-left">{{ $order->created_at->format('d M Y H:i') }}</td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a href="{{ route('orders.show', $order->id) }}" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" title="Lihat Detail">
                                            <!-- Icon View -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" title="Hapus Pesanan">
                                                <!-- Icon Delete -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
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