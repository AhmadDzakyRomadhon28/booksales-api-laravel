<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>
<body>
    <h1>Daftar Buku</h1>

    @foreach ($books as $item)
        <ul>
            <li><strong>Judul:</strong> {{ $item->title }}</li>
            <li><strong>Deskripsi:</strong> {{ $item->description }}</li>
            <li><strong>Harga:</strong> Rp {{ number_format($item->price, 0, ',', '.') }}</li>
            <li><strong>Stok:</strong> {{ $item->stock }}</li>
        </ul>
        <hr>
    @endforeach
</body>
</html>