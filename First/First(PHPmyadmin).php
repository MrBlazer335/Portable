<?php
    $servername = "localhost";
    $username = "root";
    $password="";
    $dname="Email";
    $connect= new mysqli($servername,$username,$password,$dname);
    if ($connect->connect_error){
        die("Connection failed : ".$connect->connect_error);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($connect, $_POST['Email']);
    $query = "SELECT * FROM EMAIL WHERE Email = '$email'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO EMAIL (Email) VALUES ('$email')";
        if ($connect->query($sql) === TRUE) {
            echo "New record bla-bla-bla";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    } else {
        echo "This email already exists";
    }
}
$connect->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style1.css"/>
    <meta charset="utf=8">
    <title>Another try</title>
</head>
<body>
    <div class="lol_prank"></div>
    <nav>
        <ul>
            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <div class="content">Home Page for your next project</div>
    <div class="lorem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi iure ipsam aut quis optio molestiae deserunt, aperiam recusandae eos, praesentium, laborum adipisci quam perspiciatis, nesciunt magnam fuga possimus labore non.</div>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <input class="finale" type="email" name="Email" placeholder="Enter your e-mail adress" required>
        <input class="button" type="submit" value="Get started →">
    </form>

    <div class="square">
        <img src="../img/square.jpg">
    </div>
</body>
</html>
