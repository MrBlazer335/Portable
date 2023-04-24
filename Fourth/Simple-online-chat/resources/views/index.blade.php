@extends('layout.layout')

@section('title','HomePage')

@section('content')
    <img class="left-top" src="{{asset('img/Triangle with Circle.png')}}" alt="#">
    <img class="left-bottom" src="{{asset('img/Double Square.png')}}" alt="#">
    <img class="right-top" src="{{asset('img/Double Square.png')}}" alt="#">
    <img class="right-bottom" src="{{asset('img/Circle with Triangle.png')}}" alt="#">
        <span>Welcome!</span>
            <form method="POST" action="{{route('SignUp')}}">
                @csrf
                <label for="input-field1" class="mb-3">Login</label>
                <input type="text" id="input-field1" name="email" class="mb-4" placeholder="✉️ | Exemple@exemple.com">
                <label for="input-field2" class="mb-3">Password</label>
                <input type="password" id="input-field2" name="password" placeholder="🔒 | ********">
                <a href="#" class="btn-link text-primary text-decoration-none fw-bold mt-2">Forget password?</a>
                <button type="submit" class="btn btn-lg bg-primary text-white mt-3">Log in</button>
                <hr class="mt-4">
                <a href="{{route('redirect')}}"> <img src="{{asset('img/icon-google.svg')}}" class="icon-g me-2" alt="Google"></a>
                <p class="mt-5">Dont have account? <a href="{{url('/register')}}" class="btn btn-link text-decoration-none fw-bold text-primary">Sign up</a></p>
            </form>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

@endsection
