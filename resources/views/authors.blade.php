<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Penulis - BookSales</title>
</head>
<body>
    <h1>Daftar Penulis Buku</h1>

    @foreach ($authors as $item)
        <ul>
            <li><strong>ID:</strong> {{ $item['id'] }}</li>
            <li><strong>Nama Penulis:</strong> {{ $item['name'] }}</li>
            <li><strong>Foto:</strong> {{ $item['photo'] }}</li>
            <li><strong>Biografi:</strong> {{ $item['bio'] }}</li>
        </ul>
        <hr>
    @endforeach
</body>
</html>