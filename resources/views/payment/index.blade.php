<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Payments</h1>
            <a href="#" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">New Payment</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($payments->isEmpty())
            <p class="text-gray-600">No payments found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-4 text-left">No</th>
                            <th class="py-3 px-4 text-left">Invoice</th>
                            <th class="py-3 px-4 text-left">Method</th>
                            <th class="py-3 px-4 text-left">Code</th>
                            <th class="py-3 px-4 text-left">User</th>
                            <th class="py-3 px-4 text-right">Subtotal</th>
                            <th class="py-3 px-4 text-center">Status</th>
                            <th class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($payments as $i => $payment)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-4 text-left">{{ $i + 1 }}</td>
                                <td class="py-3 px-4 text-left">{{ $payment->invoice }}</td>
                                <td class="py-3 px-4 text-left">{{ $payment->method }}</td>
                                <td class="py-3 px-4 text-left">{{ $payment->code }}</td>
                                <td class="py-3 px-4 text-left">{{ $payment->user->name ?? '-' }}</td>
                                <td class="py-3 px-4 text-right">Rp{{ number_format($payment->subtotal, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 text-center">
                                    @if ($payment->status === 'Verified')
                                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">Verified</span>
                                    @elseif ($payment->status === 'Pending')
                                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full">Pending</span>
                                    @else
                                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-700 rounded-full">{{ $payment->status }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <a href="#" class="text-orange-600 hover:underline font-semibold">View</a>
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