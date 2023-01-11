<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content = "width=device-width, initial-scale=1.0">
    <title> Ajouter utilisateur </title>
</head>
<body>
<?php 
       include_once'navs.php';
       require 'connexion.php';
        if(isset($_POST['ajouter'])){
           $email= $_POST['email'];
           $password = $_POST['password'];
           $capteur = $_POST['capteur'];
           $creation = date('m-d-Y h:i:s a', time());
           if (!empty($email) && !empty($password) && !empty($capteur)){
               $sqlState = $pdo->prepare('INSERT INTO utilisateur (`creation`, `email`, `password`, `capteur`) VALUES(?,?,?,?)');
               $sqlState->execute([$creation,$email,$password,$capteur]);
  
               header('location:users.php');
           }else{
               echo "Le email et le propriétaires sont requis!";
           }
       }
 ?>
    
 <form method="POST">
    <label>email</label><br>
        <input type="text" name = "email" ><br>
        <label> password </label><br>
        <input type = "password" name = "password"><br><br>
        <label> Capteur </label><br>
        <input type = "text" name = "capteur"><br><br>

        <input type = "submit" value = "Ajouter" name="ajouter">
    </form>
</body>
</html>