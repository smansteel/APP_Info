<html>
<head>
    <title>inserting php code into html </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link rel="stylesheet" href="style.css"-->
</head>
<body>
   <h2>natural numbers</h2>
   <?php 
   for ($i=0; $i<10; $i++) {
    echo "$i";
  }
   ?>
   test

   <?php 
    include "db_connect.php";
    $conn = OpenCon();

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
   }else{
    echo "<br>Connected Successfully";
    $query = "SELECT * FROM `users` ";
    $users = "smansteelyt@gmail.com";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   
    
    /* create a prepared statement */
    $stmt = mysqli_prepare($conn, "SELECT password FROM users WHERE email=?");
    
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt, "s", $users);
    
    /* execute query */
    mysqli_stmt_execute($stmt);
    
    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $passwd);
    
    /* fetch value */
    mysqli_stmt_fetch($stmt);
    echo "<br>";
    printf("%s has for password %s\n", $users, $passwd);
    CloseCon($conn);
    $conn = OpenCon();

    /* create a prepared statement */
    $password = "test";
    $mail = "potate@captair.paris";
    $hashed = password_hash($password, 1);
    echo $hashed;
    $stmt2 = mysqli_prepare($conn, "INSERT INTO users(email, password) VALUES (?, ?)");
    
    /* bind parameters for markers */
    mysqli_stmt_bind_param($stmt2, "ss", $mail, $hashed );

    /* execute query */
    mysqli_stmt_execute($stmt2);

    echo "<br> Done";

    CloseCon($conn);
    
   }

   ?>
</body>
</html>