<?php
session_start();
    $server="localhost";
    $name="root";
    $password="";
    $dbname="Accounts";
    $conn = new mysqli($server,$name,$password,$dbname);
        if(!$conn){
            die("Connection is failed");
        }
return $conn;
        ?>