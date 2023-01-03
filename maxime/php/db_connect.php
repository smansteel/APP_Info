<?php
function OpenCon()
{


    // windows
    $dbuser = getenv('DB_USERNAME');
    $dbpass =  getenv("DB_PASSWORD");
    $dbport = getenv('DB_PORT');
    $dbname =  getenv("DB_NAME");
    $dbhost =  getenv("DB_HOST");

    //server
    // $dbuser = $_ENV["DB_USERNAME"];
    // $dbpass =  $_ENV["DB_PASSWORD"];
    $conn = new mysqli($dbhost.":".$dbport, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n" . $conn->error);

    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}
