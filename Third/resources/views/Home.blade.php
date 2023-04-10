@extends('layout.layout')

@section('title','Welcome to our app!')


@section('content')
    <div class="main_home" xmlns="http://www.w3.org/1999/html"></div>
            <div class="container">
                <p class="user-name">Welcome, {{ session('name') }}!</p>
                <a class="log-out-btn" href="{{action('\App\Http\Controllers\LogOutController@LogOut')}}">Log Out</a>

                <form class="Income" method="POST" action="{{route('DataInput')}}">
                    @csrf
                    <ul>
                        <li> <h1>Input</h1></li>
                        <li><label>Date</label>
                            <input type="date" name="date" class="info_1"></li>
                        <li><label for="type">Choose option:</label>
                            <select id="type" name="type" class="info_1" required>
                                <option value="">--Select--</option>
                                <option value="type1">Expenses</option>
                                <option value="type2">Income</option>
                            </select></li>
                        <li><label for="category">Choose category</label>
                            <select id="category" name="category" class="info_2" required>
                                <option value="">--Select--</option>
                            </select></li>
                    <li><input type="number" class="number" name="amount" min="0" step="any" placeholder="Enter Number: " required></li>
                    <li><label>Comment</label><input type="text" class="Comment" name="Comment"></li>
                    <li><button  type="submit" class="btn_info">Submit</button></li>
                    </ul>

                </form>
                <div class="listoffive">
                @foreach(array_slice($data1, -5, 5) as $transaction)
                    <form class="output">
                        <input name="date" value="{{$transaction->date}}" readonly>
                        <input name="type" value="{{$transaction->type}}" readonly>
                        <input name="category" value="{{$transaction->category}}" readonly>
                        <input name="amount" value="{{$transaction->amount}}">
                        <input name="comment" value="{{$transaction->comment}}">
                    </form>

                @endforeach

                @foreach(array_slice($data2, -5, 5) as $transaction)
                    <form class="output">
                        <input name="date" value="{{$transaction->date}}" readonly>
                        <input name="type" value="{{$transaction->type}}" readonly>
                        <input name="category" value="{{$transaction->category}}" readonly>
                        <input name="amount" value="{{$transaction->amount}}">
                        <input name="comment" value="{{$transaction->comment}}">
                    </form>
                @endforeach
                 <p>Bank: {{$bank}}</p>
                    <button class="btn-clear"><a href="http://127.0.0.1:8000/delete">Delete all your transactions</a></button>
                </div>

            </div>

    <script>
        const typeofOperations = {
            type1: ['Food', 'Transport', 'Mobile connection', 'Network', 'Entertainment', 'Others'],
            type2: ['Salary', 'Other income']
        };

        const typeSelector = document.getElementById('type');
        const categorySelector = document.getElementById('category');

        typeSelector.addEventListener('change', () => {
            const Selectedtype = typeSelector.value;
            const types = typeofOperations[Selectedtype] || [];

            categorySelector.innerHTML = '<option value="">--Select--</option>';
            types.forEach(type => {
                const option = document.createElement('option');
                option.value = type;
                option.text = type;
                categorySelector.appendChild(option);
            });
        });
    </script>







@endsection
