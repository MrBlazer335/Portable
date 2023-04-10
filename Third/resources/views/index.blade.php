@extends ('layout.layout')
@section('title','HomePage')

@section('content')
    <div class="main">
            <div class="menu">
            <div class="buttons">
                <div id="btn"></div>

                <button id="login-btn" type="button" class="toggle-btn" onclick="login()">Log in</button>
                <button id="register-btn" type="button" class="toggle-btn" onclick="register()">Sign up</button>
            </div>

                <form id="login" class="input" method="POST" action="{{route('SignUp')}}"  novalidate style="left:-4px;">
                    @csrf
                <input type="email" name="email" class="input-field" placeholder="User's Email">
                <input type="password" name="password" class="input-field" placeholder="User's Password">
                <button type="submit" class="submit-btn">Log in</button>
                </form>
            <form id="registr" class="input" method="POST" action="{{route('CreateUser')}}" novalidate>
            @csrf
            <input type="text" name="rname" class="input-field" placeholder="User's Name">
            <input type="email" name="remail" class="input-field" placeholder="User's Email">
            <input type="password" name="rpassword" class="input-field" placeholder="User's Password">
            <input type="password" name="confpassword" class="input-field" placeholder="Confirm Password">
            <button type="submit" class="submit-btn">Sign in</button>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
<script>
    var x = document.getElementById("login");
    var y = document.getElementById('registr');
    var z = document.getElementById('btn');
    function register(){
        x.style.left = "-410px";
        y.style.left = "-8px";
        z.style.left = "110px";
    }
    function login(){
        x.style.left = "-8px";
        y.style.left = "410px";
        z.style.left = "0";
    }


    const loginBtn = document.getElementById('login-btn');
    const registerBtn = document.getElementById('register-btn');
    const Loginform = document.getElementById('login');
    const Registerform = document.getElementById('registr');
    loginBtn.addEventListener('click', () => {
        Loginform.style.display = 'block';
        Registerform.style.display = 'none';
    });
    registerBtn.addEventListener('click', () => {
        Loginform.style.display = 'none';
        Registerform.style.display = 'block';
    });
</script>
@endsection


