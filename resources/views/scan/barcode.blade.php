<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan Barcode</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Scan Barcode</h1>
        <p class="text-gray-700 mb-6">Silakan scan QR code di bawah ini untuk melakukan pemesanan menu melalui aplikasi.</p>
        <div class="flex justify-center mb-4">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=https://simca.majako.com/admin/catalog?table=DED01GB" alt="QR Code" class="mx-auto">
        </div>
        <p class="text-xs text-gray-500 mb-2">https://simca.majako.com/admin/catalog?table=DED01GB</p>
        <p class="italic text-gray-600">Scan barcode ini untuk langsung menuju halaman login aplikasi pemesanan menu.</p>
    </div>
</body>
</html> 