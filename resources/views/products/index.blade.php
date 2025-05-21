<!DOCTYPE html>
<html>
<head>
    <title>Daftar Menu</title>
</head>
<body>
    <h1>Daftar Menu</h1>

    <ul>
        @foreach ($products as $product)
            <li>
                <strong>{{ $product->name }}</strong><br>
                {{ $product->description }}<br>
                Rp {{ $product->price }}
            </li>
        @endforeach
    </ul>
</body>
</html>
