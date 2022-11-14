<?php

include "mailsend.php";
include "db_connect.php";


function add_otp_for_id($id, $usage, $from_page)
{
    $conn = OpenCon();
    $usertoken = tokenGen();

    //fetch from db if an account with this email exists
    $stmt4 = mysqli_prepare($conn, "SELECT email FROM users WHERE id=?");
    mysqli_stmt_bind_param($stmt4, "s", $id);
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_bind_result($stmt4, $email);
    while (mysqli_stmt_fetch($stmt4)) {
        //printf("%s \n", $email);
    }
    mysqli_stmt_close($stmt4);
    echo $email . "<br>";

    if (!isset($email)) {
        header("Location: /$from_page.php?error=email");
    } else {

        $time = time();

        //clean old verif links

        $stmt4 = mysqli_prepare($conn, "DELETE FROM onetimepasses WHERE account_id=?");
        mysqli_stmt_bind_param($stmt4, "s", $id);
        mysqli_stmt_execute($stmt4);
        mysqli_stmt_close($stmt4);

        // add new verification token in db
        /* utilisation d'utilisation dans la requete sql: 0 : creation compte
                                                          1 : changer mdp
        */
        $stmt2 = mysqli_prepare($conn, "INSERT INTO onetimepasses (token, utilisation, creation_time, account_id) VALUES (?, $usage, ?, $id);");
        mysqli_stmt_bind_param($stmt2, "ss", $usertoken, $time);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
        return [$usertoken, $email];
    }
}

function verif_otp_for_email($otp)
{
    $conn = OpenCon();
    $usertoken = $otp;

    $stmt3 = mysqli_prepare($conn, "SELECT account_id, creation_time, utilisation FROM onetimepasses WHERE token=?");
    mysqli_stmt_bind_param($stmt3, "s", $usertoken);
    mysqli_stmt_execute($stmt3);
    $result = mysqli_stmt_get_result($stmt3);
    $rowcount = mysqli_num_rows($result);
    mysqli_stmt_close($stmt3);
    $id_array = [];
    while ($row = mysqli_fetch_row($result)) {
        array_push($id_array, $row[0], $row[1], $row[2]);
    }
    if ($rowcount == 0) {
        header("Location: /invalid_link.php");
    } else {
        $id = $id_array[0];
        $creatime = $id_array[1];
        $usage = $id_array[2];

        if ($usage == 0) {



            if (time() > $creatime + 3600) {
                header("Location: /invalid_link.php");
            } else {

                //delete the entry in the db
                $stmt3 = mysqli_prepare($conn, "DELETE FROM onetimepasses WHERE token = ?");
                mysqli_stmt_bind_param($stmt3, "s", $usertoken);
                mysqli_stmt_execute($stmt3);
                mysqli_stmt_close($stmt3);

                // set verified status
                $stmt5 = mysqli_prepare($conn, "UPDATE users SET verified = 1 WHERE id = ?;");
                mysqli_stmt_bind_param($stmt5, "s", $id);
                mysqli_stmt_execute($stmt5);
                mysqli_stmt_close($stmt5);


                header("Location: /login.php");
            }
        } else if ($usage == 1) {
            try {
                if (time() > $creatime[0] + 3600) {
                    header("Location: /invalid_link.php");
                } else {

                    session_start();
                    $_SESSION["id"] = $id;
                    $_SESSION["token"] = $usertoken;
                    header("Location: /newpassword.php");
                }
            } catch (Exception $e) {
                if (time() > $creatime + 3600) {
                    header("Location: /invalid_link.php");
                } else {

                    session_start();
                    $_SESSION["id"] = $id;
                    $_SESSION["token"] = $usertoken;
                    header("Location: /newpassword.php");
                }
            }
        }
    }

    return $email;
}

function sendMail_redir($email, $usertoken)
{
    // send the email
    phpMailSender($usertoken, $email, 0);
    //header("Location: /verify.php");
}

function addUser($mail, $nom, $prenom, $hashed)
{
    $conn = OpenCon();


    //fetch from db if an account with this email exists
    $stmt4 = mysqli_prepare($conn, "SELECT id FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt4, "s", $mail);
    mysqli_stmt_execute($stmt4);
    $result = mysqli_stmt_get_result($stmt4);
    $rowcount = mysqli_num_rows($result);
    mysqli_stmt_close($stmt4);
    if ($rowcount != 0) {
        header("Location: /newaccount.php?error=email");
    } else {
        //add in the db the new account
        $stmt = mysqli_prepare($conn, "INSERT INTO users(email, password, nom, prenom) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $mail, $hashed, $nom, $prenom);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);



        //get the id of the new account (could be removed with som optimization)
        $stmt3 = mysqli_prepare($conn, "SELECT id FROM users WHERE email=?");
        mysqli_stmt_bind_param($stmt3, "s", $mail);
        mysqli_stmt_execute($stmt3);
        mysqli_stmt_bind_result($stmt3, $id);
        $result = mysqli_stmt_get_result($stmt3);
        mysqli_stmt_close($stmt3);
        $id_array = [];
        while ($row = mysqli_fetch_row($result)) {
            array_push($id_array, $row[0]);
        }
        return $id_array[0];
    }
}
