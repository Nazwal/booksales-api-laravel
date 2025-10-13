<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>authors</title>
</head>
<body>
<h1>Ini adalah halaman author buku</h1>
    @foreach ($authors as $item)
    <ul>
        <li>{{ $item['penulis'] }}</li>
    </ul>
    @endforeach
</body>
</html>