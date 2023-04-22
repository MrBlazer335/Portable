@extends('layout.layout')

@section('title','HomePage')

@section('content')

        <div class="col-4 position-absolute top-0 start-0 p-0 m-0 d-none d-md-block">
            <img src="{{ asset('img/Triangle with Circle.png') }}" alt="Square">
        </div>
    <div class="d-md-none col-2 d-flex flex-column h-20" style="width: 30%; height: 5%;"><img src="{{ asset('img/Triangle with Circle.png') }}" alt="Square"></div>
        <div class="col-4 position-absolute bottom-0 start-0 p-0 m-0 d-none d-md-block">
            <img src="{{ asset('img/Double Square.png') }}" alt="Square">
        </div>
        <div class="d-md-none col-2 d-flex flex-column h-30 fixed-bottom" style="width: 30%; height: 14%;"><img src="{{ asset('img/Double Square.png') }}" alt="Square"></div>

@endsection
