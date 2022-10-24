<?php
/* create a prepared statement */
      $password = "test";
      $mail = "potate@captair.paris";
      $hashed = password_hash($password, 1);
      echo $hashed;
      $stmt2 = mysqli_prepare($conn, "INSERT INTO users(email, password) VALUES (?, ?)");

      /* bind parameters for markers */
      mysqli_stmt_bind_param($stmt2, "ss", $mail, $hashed);

      /* execute query */
      mysqli_stmt_execute($stmt2);

      echo "<br> Done";

      CloseCon($conn);
      
      
      ?>