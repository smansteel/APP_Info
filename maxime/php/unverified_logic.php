<?php

include "verif_account.php";
if(!isset($_GET["id"])){
    header("Location: /login.php");
}else{
    //[$id, $usertoken, $email]
    $infos = add_otp_for_id($_GET["id"], 0, "unverified");
    sendMail_redir($infos[1], $infos[0]);
    header("Location: /unverified.php");

}

?>