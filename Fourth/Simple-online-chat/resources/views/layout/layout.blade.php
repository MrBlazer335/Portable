<!Doctype Html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta charset="utf-8">
    @yield('head')
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
</head>
<body class="bg-black">
<img class="left-top" src="{{asset('img/Triangle with Circle.png')}}" alt="#">
<img class="left-bottom" src="{{asset('img/Double Square.png')}}" alt="#">
<img class="right-top" src="{{asset('img/Double Square.png')}}" alt="#">
<img class="right-bottom" src="{{asset('img/Circle with Triangle.png')}}" alt="#">
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
