<?php

if(isset($_POST["email"]) || isset($_POST["password"]) ) {
    include "db_connect.php";
    $conn = OpenCon();
    $mail = $_POST["email"];
    $passwd = $_POST["password"];

    $hashed = password_hash($passwd, PASSWORD_DEFAULT);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   
    
    /* create a prepared statement */
    $stmt = mysqli_prepare($conn, "SELECT id, password, nom, prenom, creation FROM users WHERE email=?");
    
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "s", $mail);
    
    /* execute query */
    mysqli_stmt_execute($stmt);
    
    /* bind result variables */
    mysqli_stmt_bind_result($stmt,$id, $hash, $nom, $prenom, $creation);
    while (mysqli_stmt_fetch($stmt)) {
        //printf(" %s %s %s %s %s\n", $id, $hash, $nom, $prenom, $creation);
    }
    
    /* fetch value */

    if(!isset($nom)){
        header("Location: /login.php?error=noacc");
        
    }else{
        if (password_verify( $passwd,  $hash))
        {

            session_start();
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $mail;
            $_SESSION["nom"] = $nom;
            $_SESSION["prenom"] = $prenom;
            $_SESSION["creation"] = $creation;

            echo $nom . " " . $_SESSION["nom"] ;
            header("Location: /moncompte.php");
        }


        else{header("Location: /login.php?error=badcred");
            echo "Bah non mauvais mdp ";}
            
    }
    CloseCon($conn);
}
?>