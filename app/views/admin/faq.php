<!DOCTYPE html>

<?php $faqlist = $data['faqlist'] ?>
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

    <a href="<?= $root ?>admin/ajouter/faq/">Ajout Question</a>
    <table class="table table-secondary table-striped table-hover" border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Titre</th>
                <th>Contenu</th>
            </tr>
        </thead>
        <tbody>
            <?php

            //var_dump($userlist);s
            foreach ($faqlist as $utilisateur) {
                //var_dump($utilisateur);

                $id = $utilisateur['id'];
            ?>
                <tr>
                    <td><?php echo $utilisateur['id'] ?></td>
                    <td><?php echo $utilisateur['titre'] ?></td>

                    <td><?php echo $utilisateur['contenu'] ?></td>
                    <td>
                        <a href="<?= $root ?>admin/modif/faq/<?= $id ?>">Modifier</a>
                        <a href="<?= $root ?>admin/del_conf/faq/<?= $id ?>">Supprimer</a>
                    </td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</body>

</html>