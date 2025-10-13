<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
</head>
<body>
    <h1>Hello world</h1>
    <p>selamat datang di toko book sales</p>
  
    @foreach ($books as $item)
    <ol>
        <li>{{ $item['title'] }}</li>
        <li>{{ $item ['description'] }}</li>
        <li>{{ $item ['price'] }}</li>
        <li>{{ $item ['stock'] }}</li>
    </ol>
    
    @endforeach


</body>
</html>