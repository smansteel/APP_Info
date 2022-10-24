<?php

if(isset($_POST["email"]) || isset($_POST["password"]) ) {
    include "db_connect.php";
    $conn = OpenCon();
    $mail = $_POST["email"];
    $passwd = $_POST["password"];
    $hashed = password_hash($passwd, 1);
    $hashed_1234 = password_hash("1234", 1);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   
    
    /* create a prepared statement */
    $stmt = mysqli_prepare($conn, "SELECT email, password FROM users WHERE email=?");
    
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "s", $mail);
    
    /* execute query */
    mysqli_stmt_execute($stmt);
    
    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $mail, $hash);
    
    /* fetch value */
    $rarray = [];
    while (mysqli_stmt_fetch($stmt)) {
        array_push($rarray, $mail, $hash);
        printf ("%s, %s \n", $mail, $hash);
    }
    if(!$rarray[0]){
        header("Location: /loginpage.php/?error=noacc");
        
    }else{
        if (password_verify( $passwd,  $hashed))
        {header("Location: /moncompte.php");

            session_start();
            $_SESSION["email"] = "$mail";
            $_SESSION["lastname"] = "Parker";}

        else{echo "Bah non mauvais mdp ";}
    }
    CloseCon($conn);
}
?>