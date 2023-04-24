@extends('layout.layout')
@section('head')
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
@endsection
@section('title','Home')

@section('content')
    <div class="people">
        <button><img src="" alt=""></button>
    </div>


    <a href="{{route('LogOut')}}" class="btn btn-lg bg-primary">Log out</a>
@endsection
