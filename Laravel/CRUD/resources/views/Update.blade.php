<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRUD</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>

<body>
    <div class="container">
        <h1 class="my-5">Update</h1>

        <form method="post" action={{ route('products.update', ['product'=>$product->id]) }}>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">
                    Name
                </label>
                <input type="text" value="{{$product->name}}" class="form-control" name="name" id="name"
                    placeholder="Product name" />
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">
                    Price
                </label>
                <input type="text" value="{{$product->price}}" class="form-control" name="price" id="price"
                    placeholder="Product price" />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">
                    Description
                </label>
                <input type="text" value="{{$product->description}}" class="form-control" name="description"
                    id="description" placeholder="Product description" />
            </div>
            <button type="submit" class="btn btn-success">
                Update Product
            </button>
        </form>
    </div>
    <script defer src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>
