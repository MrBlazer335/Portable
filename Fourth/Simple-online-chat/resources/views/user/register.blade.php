@extends('layout.layout')

@section('title','Registration')
@section('content')
<img class="left-top" src="{{asset('img/Triangle with Circle.png')}}" alt="#">
<img class="left-bottom" src="{{asset('img/Double Square.png')}}" alt="#">
<img class="right-top" src="{{asset('img/Double Square.png')}}" alt="#">
<img class="right-bottom" src="{{asset('img/Circle with Triangle.png')}}" alt="#">

<span>Register</span>
<form method="POST" action="#">
    @csrf
    <label for="input-name" class="mb-2">Name</label>
    <input type="text" id="input-name" name="name" class="mb-2" placeholder="📛 | John">
    <label for="input-email" class="mb-2">Login</label>
    <input type="text" id="input-email" name="email" class="mb-2" placeholder="✉️ | Exemple@exemple.com">
    <label for="input-password" class="mb-2">Password</label>
    <input type="password" id="input-password" name="password" class="mb-2" placeholder="🔒 | ********">
    <label for="input-password1" class="mb-2">Confirm Password</label>
    <input type="password" id="input-password1" name="password_confirmation" placeholder="🔒 | ********">
    <button type="submit" class="btn btn-lg bg-primary text-white mt-3">Log in</button>
    <hr class="mt-4">
    <img src="{{asset('img/icon-google.svg')}}" class="icon-go me-2" alt="Google">
    <p class="mt-1">Have account? <a href="{{url('/')}}" class="btn btn-link text-decoration-none fw-bold text-primary">Sign in</a></p>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif










@endsection
