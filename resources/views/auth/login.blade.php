@extends('layout.guest')
@section('content')

<form method="post" action="{{ route('login_controller') }}">
                @csrf
                Email: <input type="text" name="email" > <br/>
                Password: <input type="password" name="password"><br/>
                <button type="submit">Login</button>

                <a href="{{ route('forgot-password') }}">Forgot password</a>
 </form>
@endsection
