<?php
    require 'connexion.php';

$id = $_GET['id'];
var_dump($id);

 $sqlstate = $pdo->prepare('DELETE FROM utilisateur WHERE id =?');
 $sqlstate -> execute([$id]);

 header('location:users.php');


?>