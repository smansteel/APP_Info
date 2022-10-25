<?php

if(isset($_POST["email"]) || isset($_POST["password"]) ) {
    include "db_connect.php";
    $conn = OpenCon();
    $mail = $_POST["email"];
    $passwd = $_POST["password"];
    echo $passwd . "<br>";
    $hashed = password_hash($passwd, PASSWORD_DEFAULT);

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
    }
    if(!$rarray[0]){
        header("Location: /login.php?error=noacc");
        
    }else{
        if (password_verify( $passwd,  $hash))
        {header("Location: /moncompte.php");

            session_start();
            $_SESSION["email"] = "$mail";
            $_SESSION["token"] = "Parker";}

            //add session material

        else{header("Location: /login.php?error=badcred");
            echo "Bah non mauvais mdp ";}
            
    }
    CloseCon($conn);
}
?>