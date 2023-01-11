<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mes utilisateurs </title>
</head>
<body>
    <?php     include_once'navs.php';?>

    <a href="ajoutcap.php">Ajout capteur</a>
    <table class="table table-secondary table-striped table-hover" border="1">
        <thead>
            <tr>
                <th>Email</th> 
                <th>Creation</th>
                <th>Capteurs</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                require 'connexion.php';
                $utilisateur = $pdo-> query ('SELECT * FROM utilisateur')->fetchAll(PDO::FETCH_ASSOC);

                foreach($utilisateur as $utilisateur){
                    $id = $utilisateur ['id']; 
                    ?>
                    <tr>
                        <td><?php echo $utilisateur['email'] ?></td>
                        <td><?php echo $utilisateur['creation'] ?></td>
                        <td><?php echo $utilisateur['capteur'] ?></td>
                        <td>
                            <a href="addUser.php?id=<?= $id ?>">Ajouter</a>
                            <a href="updateUser.php?id=<?= $id ?>">Modifier</a>
                            <a href="deleteUser.php?id=<?= $id?>" onclick="return confirm('Voulez vous vraiment supprimer le utilisateur<?php echo $utilisateur['id'] ?> ? ')">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                }
            
            ?>
        </tbody>
    </table>
</body>
</html>