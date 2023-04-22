@extends('layout.layout')

@section('title','HomePage')

@section('content')
    <img class="left-top" src="{{asset('img/Triangle with Circle.png')}}" alt="Design">
    <img class="left-bottom" src="{{asset('img/Double Square.png')}}" alt="Design">
    <img class="right-top" src="{{asset('img/Double Square.png')}}" alt="Design">
    <img class="right-bottom" src="{{asset('img/Circle with Triangle.png')}}" alt="Damn">
    <div class="container">
        <span>Welcome!</span>
    </div>

@endsection
