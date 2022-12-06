<?php

include "db_connect.php";
$conn = OpenCon();

if(isset($_POST["S'inscrire"])) 
{
    $email = $_POST['email'];

    $sql = "INSERT INTO `newsletter`(`email`) VALUES (':email)')";
}

CloseCon($conn);