@extends('layout.guest')

@section('content')

<form action="{{route('productImage.add')}}" method="post" enctype="multipart/form-data" style="text-decoration:none">
    @csrf
    Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">

  {{dd($products)}}
</form>

@endsection
