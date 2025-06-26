<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="max-w-md w-full mx-auto bg-white p-4 rounded-lg shadow-md flex-1 flex flex-col">
        <h1 class="text-xl font-bold text-gray-800 mb-4 text-center">Order Summary</h1>
        @if (empty($cart))
            <p class="text-gray-600 text-center">Your cart is empty.</p>
        @else
            <div class="space-y-4 mb-4">
                @foreach ($cart as $id => $item)
                    <div class="flex items-center justify-between bg-gray-50 rounded p-3">
                        <div class="flex items-center">
                            @if ($item['image'])
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-12 h-12 object-cover rounded mr-3">
                            @endif
                            <div>
                                <div class="font-semibold text-gray-800">{{ $item['name'] }}</div>
                                <div class="text-xs text-gray-500">{{ $item['quantity'] }} x Rp{{ number_format($item['price'], 0, ',', '.') }}</div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-gray-800">Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</div>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Hapus produk ini dari keranjang?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-red-500 hover:underline mt-1">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <form action="{{ route('cart.updateAll') }}" method="POST" class="mb-4">
                @csrf
                <div class="flex items-center justify-between mb-2">
                    <label class="font-medium text-gray-700">Meja</label>
                    <select name="table_id" class="border rounded px-2 py-1 w-1/2">
                        @foreach ($tables as $table)
                            <option value="{{ $table->id }}" {{ (isset($selectedTable) && $selectedTable == $table->id) ? 'selected' : '' }}>{{ $table->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <label class="font-medium text-gray-700">Metode Pembayaran</label>
                    <select name="payment_method" class="border rounded px-2 py-1 w-1/2">
                        <option value="cash">Cash</option>
                        <option value="transfer">Transfer</option>
                    </select>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <label class="font-medium text-gray-700">Catatan</label>
                    <input type="text" name="note" class="border rounded px-2 py-1 w-1/2" value="{{ old('note') }}">
                </div>
                <button type="submit" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 rounded mb-2">Update Order</button>
            </form>
            <div class="flex justify-between items-center text-lg font-bold text-gray-800 mb-4">
                <span>Total</span>
                <span>Rp{{ number_format($total, 0, ',', '.') }}</span>
            </div>
            <form action="{{ route('cart.checkout') }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 rounded text-lg">Bayar</button>
            </form>
        @endif
    </div>
</body>
</html> 