<?php
session_start();
include "mailsend.php";
include "db_connect.php";
$conn = OpenCon();

if (isset($_POST["email"])) {
    $mail = $_POST["email"];

    $stmt4 = mysqli_prepare($conn, "SELECT id FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt4, "s", $mail);
    mysqli_stmt_execute($stmt4);
    $result = mysqli_stmt_get_result($stmt4);

    $rowcount = mysqli_num_rows($result);
    $id_array = [];
    while ($row = mysqli_fetch_row($result)) {
        array_push($id_array, $row[0]);
    }
    mysqli_stmt_close($stmt4);
    if ($rowcount == 0) {
        header("Location: /resetpassword.php?confirmation=email");
    } else {
        $time = time();

        /* utilisation : 0: creation compte
                        1 : changer mdp*/
        $id = $id_array[0];
        $usertoken = tokenGen();
        $stmt2 = mysqli_prepare($conn, "INSERT INTO onetimepasses (token, utilisation, creation_time, account_id) VALUES (?, 1, ?, $id);");
        mysqli_stmt_bind_param($stmt2, "ss", $usertoken, $time);
        /* execute query */
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);

        phpMailSender($usertoken, $mail, 1);
        header("Location: /resetpassword.php?confirmation=email");
    }
} else if (isset($_POST["password"]) && isset($_POST["password1"])) {

    if ($_POST["password"] == $_POST["password1"]) {
        $password = $_POST["password"];
        $hashed = password_hash($password, 1);
        $id = $_SESSION["id"];
        $usertoken = $_SESSION["token"];


        //check delete statement in db
        $stmt3 = mysqli_prepare($conn, "DELETE FROM onetimepasses WHERE token = ?");
        mysqli_stmt_bind_param($stmt3, "s", $usertoken);
        mysqli_stmt_execute($stmt3);
        mysqli_stmt_close($stmt3);


        $stmt5 = mysqli_prepare($conn, "UPDATE users SET password = ? WHERE id = ?;");
        mysqli_stmt_bind_param($stmt5, "ss", $hashed, $id);
        mysqli_stmt_execute($stmt5);
        mysqli_stmt_close($stmt5);
        session_destroy();
        header('Location: /login.php?confirmation=passwd');
    } else {
        header("Location: /newpassword.php?error=passwd");
    }
}
