<?php
include "verif_account.php";

if (isset($_POST["email"])) {
    $created_id = addUser($$_POST["email"], $_POST["nom"], $_POST["prenom"], password_hash($passwd, 1));
    // arg 0 for account creation
    $infos = add_otp_for_id($created_id, 0);
    sendMail_redir($infos[2], $infos[1]);
} else if (isset($_GET["token"])) {
    $_and_status = verif_otp_for_email($_GET["token"]);
} else {
    echo "no post or get";
    header("Location: /login.php");
}
