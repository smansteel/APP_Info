<?php
    require 'connexion.php';

$id = $_GET['id_des'];
var_dump($id);

 $sqlstate = $pdo->prepare('DELETE FROM capteurs WHERE id_des =?');
 $sqlstate -> execute([$id]);

 header('location:capair.php');


?>