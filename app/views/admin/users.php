<!DOCTYPE html>

<?php $userlist = $data['userlist'] ?>
<?php $capteurs_list = $data['capteurs_list']; ?>
<html lang="en">
<?php
$root = "/";
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mes utilisateurs </title>
</head>

<body>

    <a href="<?= $root ?>admin/ajouter/user/">Ajout utilisateur</a>
    <table class="table table-secondary table-striped table-hover" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Creation</th>
                <th>Capteurs</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php

            //var_dump($userlist);
            foreach ($userlist as $utilisateur) {
                //var_dump($utilisateur);

                $id = $utilisateur['id'];
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $utilisateur['email'] ?></td>
                    <td><?php echo $utilisateur['creation'] ?></td>

                    <td><?php

                        foreach ($capteurs_list as $capteur) {
                            if ($capteur[0] == $id) {
                                echo $capteur[1][0]["id"];
                            }
                        }
                        ?></td>
                    <td>
                        <a href="<?= $root ?>admin/modif/users/<?= $id ?>">Modifier</a>
                        <a href="<?= $root ?>admin/del_conf/users/<?= $id ?>">Supprimer</a>
                    </td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>