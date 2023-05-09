@extends('layout.layout')
@section('title','VerifyEmail')
@section('head')
    <link href="{{asset('css/VerifyEmail.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container" style="
    position: absolute;
    top: 25%;
    left: 25%;>">
            <div class="Text"><br>
                <p>Account ID: {{session('user_name')}}</p>
                <p>Google ID: {{session('google_id')}}</p>
                <h1>You need to authenticate!</h1><br>
                <h3>You will receive a message on a mail with 4-digits </h3><br>
                <h3>Your code</h3><br>
                <form method="post" action="{{route('TokenInput')}}" class="form">
                    @csrf
                    <input class="SecretCode" type="text" name="SecretCode" placeholder="****" maxlength="4"></br>
                    <button type="submit" class="btn btn-sm bg-primary">Enter!</button>
                </form>
                <button type="submit" class="btn btn-lg bg-info" style="margin-top:30%;"><a href="{{route('LogOut')}}">Log Out </a> </button>
            </div>
        </div>

@if($errors->has('SecretCode'))
    <div class="alert alert-danger">
        {{ $errors->first('SecretCode') }}
    </div>
@endif
@if($errors->has('CodeExist'))
    <div class="alert alert-danger">
        {{ $errors->first('CodeExist') }}
    </div>
@endif
@endsection
