<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier </title>
</head>

<body>
    <div class="box" style="display:flex; flex-direction:column; justify-content: center; width:100%;  min-height:90vh;align-items: center;">
        <?php
        if (isset($data["user"])) {
            $user = $data["user"];

        ?>

            <form method="post" action="/admin/edit/users/">
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>"><br>
                <label>Nom</label><br>
                <input type="text" name="nom" value="<?php echo $user['nom'] ?>"><br>
                <label>Prénom</label><br>
                <input type="text" name="prenom" value="<?php echo $user['prenom'] ?>"><br>
                <label>Email</label><br>
                <input type="text" name="email" value="<?php echo $user['email'] ?>"><br>
                <label>Password</label><br>
                <input type="text" name="password" value=""><br>
                <label>Verifié</label><br>
                <input type="text" name="verified" value="<?php echo $user['verified'] ?>"><br>
                <label>Admin</label><br>
                <input type="text" name="admin" value="<?php echo $user['admin'] ?>"><br>


                <input type="submit" value="Modifier" name="modifier">
            </form><?php

                } else if (isset($data["capteur"])) {
                    $capteurs = $data["capteur"][0];
                    ?>

            <form method="post" action="/admin/edit/capteurs/">
                <input type="hidden" name="id_sql" value="<?= $capteurs['id_sql'] ?>"><br>
                <label>status</label><br>
                <input type="text" name="status" value="<?php echo $capteurs['status'] ?>"><br>
                <label>ID</label><br>
                <input type="text" name="id" value="<?php echo $capteurs['id'] ?>"><br>
                <label>owner</label><br>
                <input type="tel" name="owner" value="<?php echo $capteurs['owner'] ?>"><br><br>
                <input type="submit" value="Modifier" name="modifier">
            </form><?php

                } else if (isset($data["faq"])) {
                    $faq = $data["faq"];
                    ?>

            <form method="post" action="/admin/edit/faq/">
                <input type="hidden" name="id" value="<?= $faq['id'] ?>"><br>
                <label>Titre</label><br>
                <input type="textarea" name="titre" value="<?php echo $faq['titre'] ?>" size="50"><br>
                <label>Contenu</label><br>
                <textarea name="contenu" cols="60" rows="5"><?php echo $faq['contenu'] ?></textarea>
                <input type="submit" value="Modifier" name="modifier">
            </form><?php

                } ?>

    </div>
</body>

</html>