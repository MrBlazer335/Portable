@extends('layout.layout')

@section('title','Registration')

@section('content')

    <div class="main">
        <div class="form">
            <h2>Simple-chat</h2>
            <form method="post">
                <ul>

                    <li><label>Insert name</label>
                        <input type="text" name="name"></li>
                    <li><label>Insert Email: </label><input type="email" name="email"></li>
                <li><label>Insert password: </label><input type="password" name="password"></li>
                <li><label>Confirm password: </label><input type="password" name="conf_password"></li>
                    <li><button type="submit">Sign-up Now</button></li>
                </ul>
            </form>
        </div>








    </div>






@endsection
