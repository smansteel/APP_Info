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
           $status= $_POST['id'];
           $owner = $_POST['owner'];
           if (!empty($status) && !empty($owner)){
              // $pdo = new PDO('mysql:host=localhost;dbname=capteurs','root','');
               $sqlState = $pdo->prepare('INSERT INTO capteurs VALUES(Null,?,0  ,?)');
               $sqlState->execute([$status,$owner]);
  
               header('Location: capair.php');
           }else{
               echo "Le status et le propriétaires sont requis!";
           }
       }
 ?>
    
 <form method="POST">
    <label>id</label><br>
        <input type="text" name = "id" ><br>
        <label> owner </label><br>
        <input type = "text" name = "owner"><br><br>

        <input type = "submit" value = "Ajouter" name="ajouter">
    </form>
</body>
</html>