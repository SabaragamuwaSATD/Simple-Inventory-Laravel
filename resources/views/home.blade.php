<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
        <div style="text-align: center; margin-bottom: 20px;">
            <p style="font-size: 1.2em; color: #007BFF;">Welcome {{ auth()->user()->name }}</p>
            <form action="/logout" method="POST" style="display: inline-block; margin-right: 10px;">
                @csrf
                <button type="submit" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Logout</button>
            </form>
            <form action="/create-product" method="GET" style="display: inline-block;">
                <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Add Product</button>
            </form>
        </div>

        {{-- <div style="border: 3px solid #007BFF; padding: 20px; width: 80%; margin: 20px auto; text-align: center; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <h2 style="margin-bottom: 20px;">All Posts</h2>
            @foreach($posts as $post)
                <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 5px; background-color: #f9f9f9; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
                    <h3 style="margin-bottom: 10px;">{{ $post->title }} by {{$post->user->name}}</h3>
                    <p>{{ $post->body }}</p>
                    <p><a href="/edit-post/{{$post->id}}" style="color: #007BFF; text-decoration: none;">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Delete</button>
                    </form>
                </div>
            @endforeach
        </div> --}}

        <div style="border: 3px solid #007BFF; padding: 20px; width: 80%; margin: 20px auto; text-align: center; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <h2 style="margin-bottom: 20px;">All Products</h2>
            @foreach($products as $product)
                <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 5px; background-color: #f9f9f9; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
                    <h3 style="margin-bottom: 10px;">{{ $product->name }} by {{$product->user->name}}</h3>
                    @if($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="max-width: 500px; margin-top: 10px;">
                    @endif
                    <p>{{ $product->description }}</p>
                    <p>LKR: {{ $product->price }}</p>
                    <form action="/view-product/{{$product->id}}" method="GET" style="display: inline;">
                        <button type="submit" style="padding: 5px 10px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">View</button>
                    </form>
                </div>
            @endforeach
        </div> 

    @else
        <div style="border: 3px solid red; padding: 20px; width: 300px; margin: 0 auto; text-align: center; border-radius: 10px; background-color: #f8d7da; color: #721c24;">
            <h2 style="margin-bottom: 20px;">You're Not Logged In</h2>
            <form action="/login" method="GET">
                @csrf
                <button type="submit" style="width: 100%; padding: 10px; background-color: #f5c6cb; color: #721c24; border: none; border-radius: 5px; cursor: pointer;">Login</button>
            </form>
        </div>
    @endauth
</body>
</html>