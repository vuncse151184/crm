<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
       <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Category</th>
                <th>Detail</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ dd($product->name) }}</td>
                    <td>{{ $product->category }}</td>
                   <!-- <td>{{ dd($product->details()) }}</td>-->
                </tr>
            @endforeach
        </tbody>
       </table>
       {{ $products }}
    </body>
</html>
