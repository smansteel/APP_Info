<?php

if(isset($_POST["email"]) || isset($_POST["password"]) ) {
    include "db_connect.php";
    $conn = OpenCon();
    $mail = $_POST["email"];
    $passwd = $_POST["password"];
    $hashed = password_hash($passwd, 1);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   
    
    /* create a prepared statement */
    $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email=? AND password=?");
    
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "ss", $mail, $hashed);
    
    /* execute query */
    mysqli_stmt_execute($stmt);
    
    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $id);
    
    /* fetch value */
    mysqli_stmt_fetch($stmt);
    echo "<br>";
    printf("Id of user is %s\n", $id);
    CloseCon($conn);


}



?>

