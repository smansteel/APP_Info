<?php
$password = "test";
$mail = "potate@captair.paris";

include "db_connect.php";
$conn = OpenCon();
//$mail = $_POST["email"];

function guidv4($data = null)
{
      // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
      $data = $data ?? random_bytes(16);
      assert(strlen($data) == 16);

      // Set version to 0100
      $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
      // Set bits 6-7 to 10
      $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

      // Output the 36 character UUID.
      return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


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


CloseCon($conn);
if (!$rarray[0]) {
      $conn = OpenCon();

      $hashed = password_hash($password, PASSWORD_DEFAULT);
      echo $hashed;
      $stmt2 = mysqli_prepare($conn, "INSERT INTO users(email, password) VALUES (?, ?)");

      /* bind parameters for markers */
      mysqli_stmt_bind_param($stmt2, "ss", $mail, $hashed);

      /* execute query */
      mysqli_stmt_execute($stmt2);

      echo "<br> Done";

      CloseCon($conn);
}


echo guidv4() . "<br>";

/* create a prepared statement */
