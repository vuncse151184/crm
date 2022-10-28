@extends('layout.guest')
@section('content')

    <form method="POST" action="{{route('password.reset')}}">
        @csrf
        <input type="email" placeholder="enter your email" name="email">
        <button type="submit" >Next</button>
    </form>

    {{ isset($status) ? $status : 'chua co' }}



@endsection
