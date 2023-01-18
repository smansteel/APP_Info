<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier </title>
</head>

<body>
    <?php include_once 'navs.php';
    if (isset($data["user"])) {
        $user = $data["user"][0];

    ?>

        <form method="post" action="/public/admin/edit/users/">
            <input type="hidden" name="id_sql" value="<?php echo $capteurs['id_sql'] ?>"><br>
            <label>status</label><br>
            <input type="text" name="status" value="<?php echo $capteurs['status'] ?>"><br>
            <label>ID</label><br>
            <input type="text" name="id" value="<?php echo $capteurs['id'] ?>"><br>
            <label>owner</label><br>
            <input type="tel" name="owner" value="<?php echo $capteurs['owner'] ?>"><br><br>
            <input type="submit" value="Modifier" name="modifier">
        </form><?php

            } else if (isset($data["capteur"])) {
                $capteurs = $data["capteur"][0];
                ?>

        <form method="post" action="/public/admin/edit/capteurs/">
            <input type="hidden" name="id_sql" value="<?= $capteurs['id_sql'] ?>"><br>
            <label>status</label><br>
            <input type="text" name="status" value="<?php echo $capteurs['status'] ?>"><br>
            <label>ID</label><br>
            <input type="text" name="id" value="<?php echo $capteurs['id'] ?>"><br>
            <label>owner</label><br>
            <input type="tel" name="owner" value="<?php echo $capteurs['owner'] ?>"><br><br>
            <input type="submit" value="Modifier" name="modifier">
        </form><?php

            } ?>


</body>

</html>