<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="max-w-md w-full mx-auto bg-white p-4 rounded-lg shadow-md flex-1 flex flex-col">
        <h1 class="text-xl font-bold text-gray-800 mb-4 text-center">Order Invoice</h1>
        <div class="mb-4">
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600">Status</span>
                <span class="font-semibold text-orange-600">{{ ucfirst($order->status) }}</span>
            </div>
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600">Username</span>
                <span class="font-semibold text-gray-800">{{ $order->user ? $order->user->name : 'Guest' }}</span>
            </div>
            <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600">Total</span>
                <span class="font-bold text-gray-800">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span>
            </div>
        </div>
        <div class="mb-4">
            <div class="flex border-b mb-2">
                <button class="flex-1 py-2 font-semibold text-orange-600 border-b-2 border-orange-600">Invoices</button>
                <button class="flex-1 py-2 font-semibold text-gray-400">Payments</button>
            </div>
            <div>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-gray-500">
                            <th class="py-2 text-left">User</th>
                            <th class="py-2 text-right">Subtotal</th>
                            <th class="py-2 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 text-left">{{ $order->user ? $order->user->name : 'Guest' }}</td>
                            <td class="py-2 text-right">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td class="py-2 text-center">
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full">On Process</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Order Items</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($order->orderItems as $item)
                    <li class="py-2 flex justify-between items-center">
                        <span>{{ $item->product ? $item->product->name : 'Produk tidak dikenal' }} ({{ $item->quantity }}x)</span>
                        <span class="font-semibold">Rp{{ number_format($item->quantity * $item->price, 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html> 