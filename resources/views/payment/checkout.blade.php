<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="max-w-md w-full mx-auto bg-white p-4 rounded-lg shadow-md flex-1 flex flex-col">
        <h1 class="text-xl font-bold text-gray-800 mb-4 text-center">Payment</h1>
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        <form action="{{ route('payment.process') }}" method="POST" class="space-y-4 flex-1 flex flex-col">
            @csrf
            <div class="mb-2">
                <label for="table_number" class="block text-sm font-medium text-gray-700">Table</label>
                <select name="table_number" id="table_number" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                    <option value="">Select Table</option>
                    @foreach($tables as $table)
                        <option value="{{ $table->number }}" {{ old('table_number') == $table->number ? 'selected' : '' }}>Table {{ $table->number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label for="user" class="block text-sm font-medium text-gray-700">User</label>
                <input type="text" name="user" id="user" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" value="{{ old('user', auth()->user()->name ?? '') }}">
            </div>
            <div class="mb-2">
                <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                <input type="text" name="code" id="code" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" value="{{ old('code', $orderCode ?? '') }}">
            </div>
            <div class="mb-2">
                <label for="total" class="block text-sm font-medium text-gray-700">Total</label>
                <input type="text" name="total" id="total" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" value="Rp{{ number_format($total, 0, ',', '.') }}">
            </div>
            <div class="mb-2">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" name="status" id="status" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" value="Pending">
            </div>
            <div class="mb-2">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500" value="{{ old('username', auth()->user()->name ?? '') }}">
            </div>
            <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 rounded text-lg mt-4">Confirm Payment</button>
        </form>
    </div>
</body>
</html> 