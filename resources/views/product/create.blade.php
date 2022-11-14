<style>
    input[type=text], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    textarea {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 20%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button[type=submit]:hover {
      background-color: #45a049;
    }
    input[type=number] {
      width: 30%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
    </style>
@extends('layout.guest')

@section('content')

    <form action="{{ route('product.create_new') }}" method="post" style="font-size:35px ;">
        @csrf
        Product Name:<input type="text" name="name"  ><br>

        Category:<input type="text" name="category"><br>

        Description:<textarea  name="description"></textarea> <br>
        Quantity:<input type="number" name="quantity" ><br>
        <div style="display:flex">
            Color:<br>
                <input type="checkbox" id="color" name="color" value="Red">
                <label for="color"> Red</label><br>
                <input type="checkbox" id="color" name="color" value="Green">
                <label for="color"> Green</label><br>
                <input type="checkbox" id="color" name="color" value="Green">
                <label for="color"> Blue</label><br>
        </div>
        Unit:<select name="unit"  style="font-size:35px;width:20%; height:100% margin: 10px 10px 10px 10px"><br>
                <option value="Kilogram">Kilogram</option>
                <option value="Pieces">Pieces</option>
            </select> <br>
        Is taxed:<select name="is_tax" style="font-size:35px;width:20%; height:100% margin: 10px 10px 10px 10px"><br>
            <option value="1">True</option>
            <option value="0">False</option>
        </Select><br>


            <button type="submit" >Add new product</button>
    </form>
@endsection


