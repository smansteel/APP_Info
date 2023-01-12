<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> contenu Capair </title>
</head>
<body>
    <?php     include_once'navs.php';?>

    <a href="ajoutcap.php">Ajout capteur</a>
    <table class="table table-secondary table-striped table-hover" border="1">
        <thead>
            <tr>
                <th>description</th> 
                <th>status</th>
                <th>owner</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $pdo = new PDO('mysql:host=localhost;dbname=Capteurs','root','');
                $capteurs = $pdo-> query ('SELECT * FROM capteurs')->fetchAll(PDO::FETCH_ASSOC);

                foreach($capteurs as $capteurs){
                    $id = $capteurs ['id_des']; 
                    ?>
                    <tr>
                        <td> <?= $id ?> </td>
                        <td><?php echo $capteurs['status'] ?></td>
                        <td><?php echo $capteurs['owner'] ?></td>
                        <td class="">
                            <a href="ajoutcap.php?id_des=<?= $id ?>">Ajouter</a>
                            <a href="modcap.php?id_des=<?= $id ?>">Modifier</a>
                            <a href="supcap.php?id_des=<?= $id?>" onclick="return confirm('Voulez vous vraiment supprimer le capteurs<?php echo $capteurs['id_des'] ?> ? ')">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                }
            
            ?>
        </tbody>
    </table>
</body>
</html>