<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>
<h1>Products</h1>
<ul>
    @foreach($products as $product)
        <li>{{ $product->name }}</li>
        <li>{{ $product->description }}</li>
        <li>{{ $product->price }}</li>
        <br>
    @endforeach
</ul>
</body>
</html>