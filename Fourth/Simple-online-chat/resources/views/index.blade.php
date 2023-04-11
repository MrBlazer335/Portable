@extends('layout.layout')

@section('title','Simple online chat')


@section('content')
    <div class="Head"></div>
    <div class="main">
        <div class="first">
        <h1>Hi!</h1><br>
            <h2>Are you new here?</h2><br>
            <h2><button class="btn-reg"><a href="{{route('registration')}}">Registration</a> </button> </h2>
            <h2>or</h2>
            <h2><button class="btn-log"><a href="{{route('login')}}">Log in</a></button> </h2>
        </div>
    </div>








@endsection
