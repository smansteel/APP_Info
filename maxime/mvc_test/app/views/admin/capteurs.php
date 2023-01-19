<!DOCTYPE html>
<?php
$root = "/";
?>


<?php $capteurs_ls = $data['capteurlist'] ?>
<?php $owners = $data['ownerlist']; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mes utilisateurs </title>
</head>

<body>

    <a href="<?= $root ?>admin/ajouter/capteur/">Ajout capteur</a>
    <table class="table table-secondary table-striped table-hover" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Owner</th>
                <th>Opérations</th>
            </tr>
            </tr>
        </thead>
        <tbody>
            <?php

            //var_dump($capteurs_ls);
            foreach ($capteurs_ls as $capteurs) {

                $id = $capteurs["id"];
                $id_sql = $capteurs["id_sql"];
                $own = $capteurs["owner"];
            ?>
                <tr>
                    <td> <?= $id ?> </td>
                    <td><?php echo $capteurs['status'] ?></td>
                    <td><?php
                        foreach ($owners as $owner) {

                            if ($owner[0] == $id_sql) {
                                echo $owner[1][0]["email"] . ' (id ' . $owner[1][0]["id"] . ' )';
                            }
                        }
                        ?></td>
                    <td class="">
                        <a href="<?= $root ?>admin/modif/capteurs/<?= $id_sql ?>">Modifier</a>
                        <a href="<?= $root ?>admin/del_conf/capteurs/<?= $id_sql ?>">Supprimer</a>
                    </td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>