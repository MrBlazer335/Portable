@extends('layout.layout')

@section('title','Simple online chat')


@section('content')
    <div class="Head"></div>
    <div class="main">
        <div class="first">
        <h1>Hi!</h1><br>
            <h2>Are you new here?</h2><br>
            <a href="{{route('registration')}}" class="btn-reg">Registration</a>
            <h2>or</h2>
            <a href="{{route('login')}}" class="btn-log">Log in</a>
        </div>
    </div>








@endsection
