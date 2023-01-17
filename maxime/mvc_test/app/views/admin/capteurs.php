<!DOCTYPE html>

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
    <?php include_once 'navs.php'; ?>

    <a href="ajoutcap.php">Ajout capteur</a>
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
                $own = $capteurs["owner"];
                echo $id;
            ?>
                <tr>
                    <td> <?= $id ?> </td>
                    <td><?php echo $capteurs['status'] ?></td>
                    <td><?php

                        foreach ($owners as $owner) {
                            var_dump($owner);
                            if ($owner[0] == $own) {
                                echo $capteur[1][0]["id_sql"];
                            }
                        }
                        ?></td>
                    <td class="">
                        <a href="modcap.php?id=<?= $capteurs['id_sql'] ?>">Modifier</a>
                        <a href="supcap.php?id=<?= $capteurs['id_sql'] ?>" onclick="return confirm('Voulez vous vraiment supprimer le capteurs<?php echo $capteurs['id'] ?> ? ')">Supprimer</a>
                    </td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>