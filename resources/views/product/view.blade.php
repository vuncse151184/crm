<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>

    <body>
        <div>
            <form action="{{route('product.searchbyname')}}" method="get">
                <input type="search" name="name" placeholder="Enter name to search"><br>
                <select name="is_tax" placeholder="Enter name to search">
                    <option value=""></option>
                    <option value="1">True</option>
                    <option value="0">False</option>
                    <option value="" selected disabled hidden>Choose here</option>
                </select>
                <br>
                <button type="submit">Search </button>

            </form>
        </div>
        <a href=" {{ route('create') }}">Create new Product</a>
        <!--                               -->
        <form action="{{route('product.delete_selected')}}" method="get">
            <table border="1" style="width:70%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Detail</th>
                        <th>Quantity</th>
                        <th>Color</th>
                        <th>Unit</th>
                        <th>Is Taxed</th>
                        <th>Images</th>
                        <th></th>
                        <th>Action</th>

                        <th>
                           <button type="submit" style="background-color: rgb(174, 64, 64)"> Delete all selected</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->details->description }}</td>
                            <td>{{ $product->details->quantity }}</td>
                            <td>{{ $product->details->color }}</td>
                            <td>{{ $product->details->unit }}</td>
                            <td>
                               {{ $product->details->is_tax ? 'Yes' : 'No' }}
                            </td>
                            {{-- @if ($product->images->count() > 0)
                            <td>
                                @foreach ($product->images as $image)
                                <img src="{{ asset('/img//' . $image->name) }}" alt="" srcset="" width="50" height="50">
                                @endforeach
                            </td>
                            @else
                            <td>Khong co hinh anh</td>
                            @endif --}}

                            @forelse ($product->images as $image)
                            <td>
                                @foreach ($product->images as $image)
                                <img src="{{ asset('/img//' . $image->name) }}" alt="" srcset="" width="50" height="50">
                                @endforeach
                            </td>
                            @empty
                            <td>Khong co hinh anh</td>
                            @endforelse

                            <td>
                                <a href="{{route('img', $product)}} " value="{{$product->id}}">Add Image</a>
                            </td>


                            <td>
                                <a style="text-decoration:none" href="{{route('product..edit', $product)}} " value="{{$product->id}}">Edit</a>
                                <a style="text-decoration:none" href="{{route('productdetele', $product)}} " onclick="onDelete(event)" value="{{$product->id}}">Delete</a>
                            </td>
                            <td>
                                <input type="checkbox" name="delete_array[]" value="{{$product->id}}">
                            </td>
                        </tr>

                    @endforeach

                </tbody>

            </table>
        </form>
        {{$products->appends(request()->query())->links() }}

       {{-- {{$products}} --}}
    </body>

</html>

<script>
    function onDelete(e){
        if(confirm('Press a button!\nEither OK or Cancel.') == false){return e.preventDefault();}
    }
</script>
