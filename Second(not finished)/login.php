<?php
$is_invalid=false;
if($_SERVER['REQUEST_METHOD']==="POST"){
    if(empty($_POST['email'] || $_POST['password'])){
        $is_invalid=true;
    }
    $mysqli=require __DIR__ . "/vendor/database.php";
    $sql=sprintf("SELECT * FROM ACCOUNTS WHERE email='%s'",
                $mysqli->real_escape_string($_POST['email']));
      $result = $mysqli->query($sql);
      $user = $result->fetch_assoc();
}
      if($user){
        if(password_verify($_POST["password"] , $user["PASSWORD"])){
        session_start();
        session_regenerate_id();
        $_SESSION["user_id"]=$user["id"];
        header("Location:../Home.php");
      }
      else
      {
        $error = "It doesnt work";
    } 
    $is_invalid=true;
}





?>
<!DOCTYPE HTML>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://classless.de/classless.css">
        <title>Login</title>
    </head>
    <body>
        <p>
            <h1>Log in</h1>
            <?php if($is_invalid): ?>
                <em>Invalid login</em>
                <?php endif; ?>
        </p>
        <div class="Form">
            <form method="POST">
                <input type="email" name="email" placeholder="Enter your email">
                <input type="password" name="password" placeholder="Enter your password">
                <button type="submit" name="submit" value="Happy people">Happy people</button>
            </form>
        </div>
    </body>
</html>
