<?php
function OpenCon()
{
    $dbhost = "localhost:3306";
    $dbuser = "root";
    $dbpass = getenv("DB_PASSWORD");
    $db = "captair";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}
