<?php
session_start();
include "mailsend.php";
include "db_connect.php";
$conn = OpenCon();
    echo "test";
    echo $_POST["email"];
    echo $_POST["nom"];
    echo $_POST["prenom"];
