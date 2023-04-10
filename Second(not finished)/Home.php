<?php 
session_start();
if(($_SESSION['user'])) { ?>
        <div class="No_account">
            <p> You need to log in</p>
            <p> Link to <a href="login.php">log in</a></p>
            <p> Link to <a href="registr.php">Sign up></a></p>
        </div>
    <?php } else {
        $conn=require __DIR__ . "/vendor/database.php";
        /*var_dump($_SESSION);*/
        $sql="SELECT * FROM Accounts WHERE ID={$_SESSION["ID"]}";
        
        $result = $conn->query($sql);
        if($result){
        var_dump($result);
        $user = $result->fetch_assoc();
    }
}
    ?>



<!DOCTYPE HTML>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <div class="img">
            <ul class="menu">
                <li><a href="#">Pictures</a></li>
                <li><a href="/vendor/Log out.php">Log out</a></li>
            </ul>
    <?php if(isset($user)): ?>
        <p>Hello <? echo htmlspecialchars($user['name'],ENT_QUOTES)?></p>
        <?php endif; ?>
    
</body>
</html>