<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Payment Proof</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="max-w-md w-full mx-auto bg-white p-4 rounded-lg shadow-md flex-1 flex flex-col justify-center">
        <h1 class="text-xl font-bold text-gray-800 mb-4 text-center">Upload proven file</h1>
        <form action="{{ route('payment.uploadProof') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6 mb-4">
                <label for="proof_file" class="block text-gray-700 mb-2">Are you sure you would like to do this?</label>
                <input type="file" name="proof_file" id="proof_file" class="mb-2" required>
                <span class="text-xs text-gray-500">Drag & Drop your file or click to browse</span>
            </div>
            <div class="flex justify-center space-x-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">Confirm</button>
                <a href="{{ route('payment.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-6 rounded">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html> 