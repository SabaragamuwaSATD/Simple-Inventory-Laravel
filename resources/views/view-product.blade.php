<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/">
        <button style=" padding:10px; background-color: #02541f; color: white; border: none; border-radius: 5px; cursor: pointer;">Back</button>
    </form>
    <h2>Product {{$product -> name}}</h2>
    <div style="border: 3px solid #007BFF; padding: 20px; width: 80%; margin: 20px auto; text-align: center; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h3 style="margin-bottom: 10px;">{{ $product->name }} by {{$product->user->name}}</h3>
        @if($product->image)
        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="max-width: 500px; margin-top: 10px;">
        @endif
        <p>{{ $product->description }}</p>
        <p>LKR: {{ $product->price }}</p>
        <form action="/edit-product/{{$product->id}}" method="GET" style="display: inline;">
            <button type="submit" style="padding: 5px 10px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Edit</button>
        </form>
        <form action="/delete-product/{{$product->id}}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Delete</button>
        </form>
</body>
</html>