<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md text-center">
        <h1 class="text-3xl font-bold text-green-600 mb-4">Pembayaran Berhasil!</h1>
        <p class="text-gray-700 mb-6">Terima kasih atas pesanan Anda. Pesanan Anda telah berhasil ditempatkan dan sedang diproses.</p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('catalog.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Lanjut Belanja</a>
            <a href="#" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Lihat Status Pesanan</a>
        </div>
    </div>
</body>
</html> 