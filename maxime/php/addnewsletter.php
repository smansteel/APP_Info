<?php
include "db_connect.php";
if (isset($_POST["email"])) {

    $conn = OpenCon();
    $mail = $_POST["email"];

    /* create a prepared statement */
    $stmt = mysqli_prepare($conn, "INSERT INTO newsletter (email) VALUE (?)");
    mysqli_stmt_bind_param($stmt, "s", $mail);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header('Location: /');
    $conn->close();
} else {
    header('Location: /');
}
