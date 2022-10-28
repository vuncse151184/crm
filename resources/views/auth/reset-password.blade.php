@extends('layout.guest')
@section('content')

<form method="POST" action="{{ route('update_pwd') }}">
    @csrf
    {{-- <input type="hidden" name="token" value="{{ $request->route('token') }}"> --}}
    <div class="mt-4">
        <input style="width:490px" name="email" type="email" value="{{$email}}" placeholder="enter email" readonly/></br>
        <input name="password" type="password" placeholder="enter password to reset" /></br>
        <input name="repassword" type="password" required placeholder="confirm password"/></br>
        <button>Reset</button>
    </div>

</form>

@endsection
