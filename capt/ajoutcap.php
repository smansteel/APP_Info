<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content = "width=device-width, initial-scale=1.0">
    <title> Ajouter capteurs </title>
</head>
<body>
<?php 
       include_once'navs.php';
       require 'connexion.php';
        if(isset($_POST['ajouter'])){
           $status= $_POST['status'];
           $owner = $_POST['owner'];
           if (!empty($status) && !empty($owner)){
              // $pdo = new PDO('mysql:host=localhost;dbname=capteurs','root','');
               $sqlState = $pdo->prepare('INSERT INTO capteurs VALUES(Null,?,?)');
               $sqlState->execute([$status,$owner]);
  
               header('location:capair.php');
           }else{
               echo "Le status et le propriétaires sont requis!";
           }
       }
 ?>
    
 <form method="POST">
    <label>status</label><br>
        <input type="text" name = "status" ><br>
        <label> owner </label><br>
        <input type = "text" name = "owner"><br><br>

        <input type = "submit" value = "Ajouter" name="ajouter">
    </form>
</body>
</html>