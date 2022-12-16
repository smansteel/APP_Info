<?php


include "mailsend.php";
include "db_connect.php";

$conn = OpenCon();


if (isset($_POST["email"])) {
    $mail = $_POST["email"];
    $passwd = $_POST["password"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $usertoken = tokenGen();
    $hashed = password_hash($passwd, 1);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);



    $stmt4 = mysqli_prepare($conn, "SELECT id FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt4, "s", $mail);
    mysqli_stmt_execute($stmt4);
    $result = mysqli_stmt_get_result($stmt4);
    echo var_dump($result);
    $rowcount = mysqli_num_rows($result);
    mysqli_stmt_close($stmt4);
    if ($rowcount != 0) {
        header("Location: /newaccount.php?error=email");
    } else {



        $stmt = mysqli_prepare($conn, "INSERT INTO users(email, password, nom, prenom, verified) VALUES (?, ?, ?, ?,0)");

        mysqli_stmt_bind_param($stmt, "ssss", $mail, $hashed, $nom, $prenom);

        /* execute query */
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);




        $stmt3 = mysqli_prepare($conn, "SELECT id FROM users WHERE email=?");
        mysqli_stmt_bind_param($stmt3, "s", $mail);
        mysqli_stmt_execute($stmt3);
        mysqli_stmt_bind_result($stmt3, $id);
        $result = mysqli_stmt_get_result($stmt3);
        mysqli_stmt_close($stmt3);
        //echo var_dump($result);
        $id_array = [];
        while ($row = mysqli_fetch_row($result)) {
            array_push($id_array, $row[0]);
        }




        $time = time();

        /* utilisation : 0: creation compte
                        1 : changer mdp*/
        $id = $id_array[0];

        //clean old verif links

        $stmt4 = mysqli_prepare($conn, "DELETE FROM onetimepasses WHERE account_id=?");
        mysqli_stmt_bind_param($stmt4, "s", $mail);
        mysqli_stmt_execute($stmt4);
        mysqli_stmt_close($stmt4);


        $stmt2 = mysqli_prepare($conn, "INSERT INTO onetimepasses (token, utilisation, creation_time, account_id) VALUES (?, 0, ?, $id);");
        mysqli_stmt_bind_param($stmt2, "ss", $usertoken, $time);
        /* execute query */
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);

        phpMailSender($usertoken, $mail, 0);
        header("Location: /verify.php");
    }
} else if (isset($_GET["token"])) {
    $usertoken = $_GET["token"];

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
            var_dump($creatime);
            echo time();


            if (time() > $creatime + 3600) {
                //header("Location: /invalid_link.php");
            } else {

                //check for non deleted statements in db
                $stmt3 = mysqli_prepare($conn, "DELETE FROM onetimepasses WHERE token = ?");
                mysqli_stmt_bind_param($stmt3, "s", $usertoken);
                mysqli_stmt_execute($stmt3);
                mysqli_stmt_close($stmt3);


                $stmt5 = mysqli_prepare($conn, "UPDATE users SET verified = 1 WHERE id = ?;");
                mysqli_stmt_bind_param($stmt5, "s", $id);
                mysqli_stmt_execute($stmt5);
                mysqli_stmt_close($stmt5);


                header("Location: /verified.php");
            }
        } else if ($usage == 1) {
            try {
                if (time() > $creatime + 3600) {
                    //header("Location: /invalid_link.php");
                } else {

                    session_start();
                    session_unset();     
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
} else {
    echo "no post or get";
    header("Location: /login.php");
}
