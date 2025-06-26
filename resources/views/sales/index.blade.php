<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Sales</h1>
            <a href="#" class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">New Sale</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (empty($sales) || $sales->isEmpty())
            <p class="text-gray-600 text-center">No sales data found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-4 text-left">No</th>
                            <th class="py-3 px-4 text-left">Table code</th>
                            <th class="py-3 px-4 text-left">Code</th>
                            <th class="py-3 px-4 text-left">User</th>
                            <th class="py-3 px-4 text-right">Total</th>
                            <th class="py-3 px-4 text-center">Status</th>
                            <th class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($sales as $i => $sale)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-4 text-left">{{ $i + 1 }}</td>
                                <td class="py-3 px-4 text-left">{{ $sale->table->code ?? '-' }}</td>
                                <td class="py-3 px-4 text-left">{{ $sale->code }}</td>
                                <td class="py-3 px-4 text-left">{{ $sale->user->name ?? 'Guest' }}</td>
                                <td class="py-3 px-4 text-right">IDR {{ number_format($sale->total, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 text-center">
                                    <span class="inline-block px-2 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded-full">{{ $sale->status }}</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <a href="#" class="text-gray-600 hover:text-gray-900 font-semibold mr-2">View</a>
                                    <a href="#" class="text-orange-600 hover:text-orange-800 font-semibold">Edit</a>
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