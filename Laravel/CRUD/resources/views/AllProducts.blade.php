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
        <h1 class="my-5">Crud With Laravel</h1>

        {{-- Button for inserting test data --}}
        <x-seed />

        {{-- Link to navigate to create new product page --}}
        <a href="{{route('products.create')}}" class="btn btn-success mb-3 mx-2">
            Create new product
        </a>

        {{-- Table to display products --}}
        <div class="table-responsive text-center">
            <table class="table table-dark table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    {{-- Render each product as a row --}}

                    @foreach ($products as $product)
                    {{-- Table row containing product information --}}
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>${{$product->price}}</td>
                        <td>{{$product->description}}</td>

                        {{-- Actions column containing Edit and Delete buttons --}}
                        <td class="d-flex justify-content-around">
                            {{-- Link to navigate to the Edit product page --}}
                            <a href={{ route('products.edit', ['product'=>$product->id]) }} class="btn btn-success">
                                Edit
                            </a>
                            {{-- Button to delete the product --}}
                            <form action={{ route('products.destroy', ['product'=>$product->id]) }} method="post" class="d-inline-block p-0">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <script defer src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>
