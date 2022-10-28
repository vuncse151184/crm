@extends('layout.guest')>

@section('content')
    @csrf
    <a href="{{ route('login') }}">Login</a>

    <a href="{{ route('register') }}">Register</a>
@endsection
