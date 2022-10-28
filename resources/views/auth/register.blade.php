
<!-- @extends('layout.guest') -->

@section('content')

<form method="post" action="{{ route('register_controller') }}">
    @csrf
    name:<input type="text" name="name" > <br/>
    Email: <input type="text" name="email" > <br/>
    Password: <input type="password" name="password"><br/>
    <button type="submit">Register</button>
    <!-- <p>$message</p> -->
</form>

<a href="{{ route('login')}}">Login</a>
@endsection
