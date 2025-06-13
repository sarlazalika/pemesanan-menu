<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Checkout</h1>

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('payment.process') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Customer Details -->
                <div class="space-y-4">
                    <h2 class="text-xl font-semibold text-gray-700">Informasi Pelanggan</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="name" id="name" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                value="{{ old('name', auth()->user()->name ?? '') }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                value="{{ old('email', auth()->user()->email ?? '') }}">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input type="tel" name="phone" id="phone" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="table_number" class="block text-sm font-medium text-gray-700">Nomor Meja</label>
                            <select name="table_number" id="table_number" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Pilih Nomor Meja</option>
                                @foreach($tables as $table)
                                    <option value="{{ $table->number }}" {{ old('table_number') == $table->number ? 'selected' : '' }}>
                                        Meja {{ $table->number }}
                                    </option>
                                @endforeach
                            </select>
                            @error('table_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700">Catatan Tambahan</label>
                        <textarea name="notes" id="notes" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('notes') }}</textarea>
                        @error('notes')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="border-t pt-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Ringkasan Pesanan</h2>
                    
                    <div class="space-y-4">
                        @foreach($cart as $id => $item)
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    @if($item['image'])
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" 
                                            class="w-12 h-12 object-cover rounded mr-4">
                                    @endif
                                    <div>
                                        <p class="font-medium text-gray-800">{{ $item['name'] }}</p>
                                        <p class="text-sm text-gray-600">{{ $item['quantity'] }} x Rp{{ number_format($item['price'], 2, ',', '.') }}</p>
                                    </div>
                                </div>
                                <p class="font-medium text-gray-800">Rp{{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="border-t mt-4 pt-4">
                        <div class="flex justify-between items-center text-lg font-bold text-gray-800">
                            <span>Total</span>
                            <span>Rp{{ number_format($total, 2, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="border-t pt-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Metode Pembayaran</h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input type="radio" name="payment_method" id="cash" value="cash" checked
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="cash" class="ml-3 block text-sm font-medium text-gray-700">
                                Bayar di Kasir
                            </label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="radio" name="payment_method" id="transfer" value="transfer"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="transfer" class="ml-3 block text-sm font-medium text-gray-700">
                                Transfer Bank
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('cart.index') }}" 
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded">
                        Kembali ke Keranjang
                    </a>
                    <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                        Proses Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 