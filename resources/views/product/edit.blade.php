
    @extends('layout.guest')

    @section('content')

    <form action="{{route('product.update',$product)}}" method="post" style="font-size:35px;">
        @csrf
        ID: <input type="text" name="id" readonly value="{{$product->id}}" style=" font-size:35px;width:20%; height:100%; margin: 10px 10px 10px 10px" > <br>

        Product Name:<input type="text" name="name"  value="{{$product->name}}" style="font-size:35px;width:20%; height:100% margin: 10px 10px 10px 10px"><br>

        Category:<input type="text" name="category"  value="{{$product->category}}" style="font-size:35px;width:20%; height:100% margin: 10px 10px 10px 10px"><br>

        Description:<textarea  name="description" style="font-size:30px ;width:80%" value="{{$product->details->description}}">{{$product->details->description}}</textarea> <br>
        Quantity:<input type="number" name="quantity"value="{{$product->details->quantity}}" style="font-size:35px;width:20%; height:100% margin: 10px 10px 10px 10px"><br>
        <div style="display:flex">
            Color:<br>
                <input type="checkbox" id="color" name="color" value="Red">
                <label for="color"> Red</label><br>
                <input type="checkbox" id="color" name="color" value="Green">
                <label for="color"> Green</label><br>
                <input type="checkbox" id="color" name="color" value="Green">
                <label for="color"> Blue</label><br>
        </div>
        Unit:<select name="unit"  value="{{$product->details->unit}}" style="font-size:35px;width:20%; height:100% margin: 10px 10px 10px 10px"><br>
                <option value="Kilogram">Kilogram</option>
                <option value="Pieces">Pieces</option>
            </select> <br>
        Is taxed:<select name="is_tax" value="{{$product->details->is_tax}}" style="font-size:35px;width:20%; height:100% margin: 10px 10px 10px 10px"><br>
            <option value="1">True</option>
            <option value="0">False</option>
        </Select><br>


            <button type="submit" style="font-size: 35px;width: 200px; height:100%">Update</button>
    </form>
@endsection


