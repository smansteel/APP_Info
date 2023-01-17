<!DOCTYPE html>

<?php $userlist = $data['userlist']?>
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
               
                //var_dump($userlist);
                foreach($userlist as $utilisateur){

                    $id = $utilisateur ['id']; 
                    ?>
                    <tr>
                        <td><?php echo $utilisateur['email'] ?></td>
                        <td><?php echo $utilisateur['creation'] ?></td>
                        <?php $capteur_list = $data['capteur_list']; ?>
                        
                        <td><?php var_dump($capteur_list);
                        foreach($capteur_list as $capteur){
                            echo $capteur['id'] . ' ';
                        } ?></td>
                        <td>
                            <a href="updateUser.php?id=<?= $id ?>">Modifier</a>
                            <a href="deleteUser.php?id=<?= $id?>" onclick="return confirm('Voulez vous vraiment supprimer l'utilisateur<?php echo $utilisateur['id'] ?> ? ')">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                }
            
            ?>
        </tbody>
    </table>
</body>
</html>