
@extends('layout.guest')
@section('content')
    @csrf
    <h1>hello dashboard</h1>
    <a href="{{ route('logout') }}" >Logout</a>

    <ul>
        <li>{{ $userinfo->age }}</li>
        <li>{{ $userinfo->address }}</li>
        <li>{{ $userinfo->phone }}</li>
        <li>{{ $userinfo->id }}</li>
      </ul>


    Age:<input value="{{ $userinfo->age }}">
    Address:<input value="{{ $userinfo->address }}">
    Phone:<input value="{{ $userinfo->phone }}">
    <button type="submit"  action="UpdateAuthController.php?id='$userinfo->id'">Edit</button>
@endsection
