<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Methods</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Payment Methods</h1>
            <a href="#" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">New Payment Method</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (empty($paymentMethods) || count($paymentMethods) === 0)
            <p class="text-gray-600">No payment methods found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-4 text-left">No</th>
                            <th class="py-3 px-4 text-left">Name</th>
                            <th class="py-3 px-4 text-center">Expire in minutes</th>
                            <th class="py-3 px-4 text-right">Amount min</th>
                            <th class="py-3 px-4 text-right">Amount max</th>
                            <th class="py-3 px-4 text-right">Fee</th>
                            <th class="py-3 px-4 text-center">Is active</th>
                            <th class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($paymentMethods as $i => $method)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-4 text-left">{{ $i + 1 }}</td>
                                <td class="py-3 px-4 text-left">{{ $method->name }}</td>
                                <td class="py-3 px-4 text-center">{{ $method->expire_in_minutes ?? 0 }}</td>
                                <td class="py-3 px-4 text-right">{{ number_format($method->amount_min ?? 0, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 text-right">{{ number_format($method->amount_max ?? 0, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 text-right">{{ number_format($method->fee ?? 0, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 text-center">
                                    @if ($method->is_active ?? false)
                                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">Yes</span>
                                    @else
                                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">No</span>
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