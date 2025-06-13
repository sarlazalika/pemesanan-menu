<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 p-8">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md text-center">
        <svg class="mx-auto mb-4" width="64" height="64" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="green" stroke-width="2" fill="none"/><path d="M8 12l2 2l4-4" stroke="green" stroke-width="2" fill="none"/></svg>
        <h1 class="text-2xl font-bold text-green-700 mb-4">Pembayaran Berhasil!</h1>
        <p class="text-gray-700 mb-6">Terima kasih, pesanan Anda telah diterima dan sedang diproses.</p>
        <a href="{{ route('catalog.index') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">Kembali ke Katalog</a>
    </div>
</body>
</html> 