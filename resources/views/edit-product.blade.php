<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/">
        <button style=" padding: 10px; background-color: #02541f; color: white; border: none; border-radius: 5px; cursor: pointer;">Back</button>
    </form>
    <h1>Edit Product {{$product->name}}</h1>
    <form action="/edit-product/{{$product->id}}" method="POST" enctype="multipart/form-data" style="border: 3px solid #007BFF; padding: 20px; width: 300px; margin: 0 auto; text-align: center; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        @csrf
        <div style="margin-bottom: 15px;">
            @method('PUT')
            <input type="text" name="name" value="{{$product->name}}" placeholder="Name" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <textarea name="description" placeholder="Description" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; height: 100px;">{{$product->description}}</textarea>
        </div>
        <div style="margin-bottom: 15px;">
            <input type="text" name="price" value="{{$product->price}}" placeholder="Price" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <input type="file" name="image" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
        </div>
        <button style="width: 100%; padding: 10px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Save Changes</button><br><br>
        <button style="width: 100%; padding: 10px; background-color: #02541f; color: white; border: none; border-radius: 5px; cursor: pointer;">Cancel</button>
</body>
</html>