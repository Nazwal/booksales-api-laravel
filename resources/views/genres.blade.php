<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
</head>
<body>
    <h1>Ini adalah halaman genres buku</h1>
    @foreach ($genres as $item)
    <ul>
        <li>{{ $item['genre'] }}</li>
    </ul>
    
    @endforeach
</body>
</html>