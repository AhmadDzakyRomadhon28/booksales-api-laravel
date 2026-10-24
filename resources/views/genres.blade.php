<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Genre - BookSales</title>
</head>
<body>
    <h1>Daftar Genre Buku</h1>

    @foreach ($genres as $item)
        <ul>
            <li><strong>ID:</strong> {{ $item['id'] }}</li>
            <li><strong>Nama Genre:</strong> {{ $item['name'] }}</li>
            <li><strong>Deskripsi:</strong> {{ $item['description'] }}</li>
        </ul>
        <hr>
    @endforeach
</body>
</html>